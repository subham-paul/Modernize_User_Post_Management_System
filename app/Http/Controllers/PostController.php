<?php

namespace App\Http\Controllers;

//using the model
use App\Models\Post;
//Using DB Facade 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(Request $request)
  {
    $isAdmin = ($request->session()->get("ROLE") == "admin") ? true : false;
    if ($isAdmin) {
      $posts = DB::table("posts")
        ->join("users", "users.user_id", "=", "posts.user_id")
        ->select("posts.*", "users.name", "users.role")
        ->orderByDesc('created')
        ->get();

      return view("posts.posts")->with(['posts' => $posts]);
    } else {
      $posts = DB::table("posts")
        ->join("users", "users.user_id", "=", "posts.user_id")
        ->select("posts.*", "users.name", "users.role")
        ->where("users.user_id", $request->session()->get("USER-ID"))
        ->orderByDesc('created')
        ->get();
      return view("posts.posts")->with(['posts' => $posts]);
    }
  }

  public function show($pid)
  {
    // dd($pid);
    $post = DB::table("posts")->where("post_id", $pid)->get();
    // dd($post[0]);
    return view('posts.show')->with(['post' => $post[0]]);
  }

  public function create()
  {
    return view("posts.add"); //resources/views/posts/add.blade.php

  }
  private function generate_random_postid()
  {
    return "post-" . time() . "-" . rand(1000, 9999);
  }
  public function submit(Request $request)
  {
    //dd($request->all()); //print_r($_POST);
    $post_title = $request->post_title;
    $post_desc  = $request->post_desc;
    $post_id    = $this->generate_random_postid();
    $user_id    = $request->session()->get("USER-ID");
    $dataToSubmit = [
      'post_id' =>  $post_id,
      'title'  =>  $post_title,
      "description" => $post_desc,
      "user_id"    => $user_id
    ];
    $rows =  DB::table("posts")->insert($dataToSubmit);
    $message = ($rows == 1) ? "post_insert_success"  : "post_insert_error";
    //Laravel Flash Messaging with redirect function.
    return redirect("/posts/all")->with("message", $message);
  }

  public function update(Request $request)
  {
    //dd($request->all());
    $dataToUpdate = [
      "title"         => $request->editTitle,
      "description"   => $request->editDesc
    ];
    $post_id = $request->post_id;
    $rows = DB::table("posts")->where("post_id", $post_id)->update($dataToUpdate);
    $message = ($rows == 1) ? "post_update_success" : "post_update_error";
    return redirect("/posts/all")->with("message", $message);
  }

  public function delete($pid)
  {
    //dd($pid);
    $rows = DB::table("posts")->where("post_id", $pid)->delete();
    $message = ($rows == 1) ? "post_delete_success" : "post_delete_error";
    return redirect("/posts/all")->with("message", $message);
  }
}
