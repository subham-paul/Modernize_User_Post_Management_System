<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//DB Facade
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
  //
  public function signup(Request $request)
  {
    if ($request->isMethod("POST")) {
      //submit theform
      // dd("Submitted");
      //dd($request->all());
      //if validation passes then next line will gets executed otherwise it will generate $errors and send it to the caller.
      $request->validate([
        "fname" => 'required|regex:/^[A-Z][a-z \'-]{2,11}$/',
        "lname" => 'required|regex:/^[A-Z][a-z \'-]{2,11}$/',
        "phone" => 'required|regex:/^[6-9]\d{9}$/',
        "email" => 'required|email',
        "pass1" => 'required|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/',
        "pass2" => 'required',
        "avatar" => 'required|mimes:jpg,jpeg,png,gif,pdf|max:8096'
      ]);
      $file = $request->avatar;
      $fileName = rand(1000, 9999) . "-" . time() . "-" .
        $file->getClientOriginalName();
      //dd($fileName);
      $file->move(public_path("uploads"), $fileName);
      //The Path which we will save to the Database.
      $imagePath = asset("uploads") . "/" . $fileName;

      echo "data submitted";
      $dataToSubmit = [
        "user_id"  => 'user-' . rand(1000, 9999) . "-" . time(),
        "name"     => $request->fname . " " . $request->lname,
        "phone"    => $request->phone,
        "email"    => $request->email,
        "pass1"    => password_hash($request->pass1, PASSWORD_BCRYPT),
        'profile_pic' => $imagePath

      ];
      $rows = DB::table("users")->insert($dataToSubmit);
      $message = ($rows == 1) ? "signup_success" : "signup_error";
      return redirect("/users/signup")->with("message", $message);
    } else if ($request->isMethod("GET")) {
      //load the view.
      return view("users.signup");
    }
  }
  public function signin(Request $request)
  {
    if ($request->isMethod("GET")) {
      return view("users.signin");
    } else if ($request->isMethod("POST")) {
      //dd("loggendin");
      $email = $request->email;
      $user = DB::table("users")->where("email", $email)->get();
      //dd($user[0]->pass1);
      $db_hashed_pass = $user[0]->pass1;
      $isMatched = password_verify($request->pass1, $db_hashed_pass) ? true : false;
      if ($isMatched) {
        //dd("success");
        $request->session()->put("USER", $user[0]->name);
        $request->session()->put("USER-ID", $user[0]->user_id);
        $request->session()->put("ROLE", $user[0]->role);
        return redirect("/posts/all");
      } else {
        //dd("Error");
        return redirect("/users/signin")->with("message", "invalid username or Password");
      }
    }
  }
  public function logout()
  {
    session()->forget("USER");
    session()->flush();
    return redirect("/users/signin");
  }
  public function profile(Request $request)
  {
    $user_id = $request->session()->get("USER-ID");
    $user = DB::table("users")->where("user_id", $user_id)->get();
    return view("users.profile")->with(['user' => $user[0]]);
  }
}
