<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//This action is defined by default

//Now adding Our own routes
// Route::get('/', function () {
//     //return view('home');// /resources/views/home.blade.php
//       return view("home")->with("message","Hello , everyone from laravel 10");
// });

use App\Http\Controllers\PostController;
//if suppose user has typed http://localhost:****/posts
  //then PostController@index function will gets executed.
Route::get("/",[PostController::class,'index']);
Route::get("/post/{pid}",[PostController::class,'show']);
Route::get("/posts/add",[PostController::class,'create']);
Route::post("/posts/submit",[PostController::class,'submit']);
Route::post("/posts/update",[PostController::class,'update']);
Route::get("/posts/delete/{pid}",[PostController::class,'delete']);

use App\Http\Controllers\UserController;
Route::get("/users/signup",[UserController::class,'signup']);
Route::post("/users/signup",[UserController::class,'signup']);
Route::get("/users/signin",[UserController::class,'signin']);
Route::post("/users/signin",[UserController::class,'signin']);
Route::get("/users/logout",[UserController::class,'logout']);
// Route::get("/",[UserController::class,'users']);
// Route::get("/users/profile",[UserController::class,'profile']);
