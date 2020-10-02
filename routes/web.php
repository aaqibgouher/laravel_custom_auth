<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/login", "AuthController@login")->name("login");
Route::post("/login", "AuthController@login");
Route::get("/register", "AuthController@register")->name("register");
Route::post("/register", "AuthController@register");
Route::get("/logout", "AuthController@logout")->name("logout");

Route::middleware(["check_login_user"])->group(function(){

    Route::get("/", "HomeController@index")->name("home");
    Route::get("/user_profile", "UserController@profile")->name("user_profile");
    Route::get("/add_category", "CategoryController@add")->name("add_category");
    Route::post("/add_category", "CategoryController@add");
    Route::get("/add_todo", "TodoController@add")->name("add_todo");
    Route::post("/add_todo", "TodoController@add");
});


