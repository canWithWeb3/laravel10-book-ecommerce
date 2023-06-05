<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', "/home");

Route::prefix("/")->controller(PageController::class)->group(function(){
    Route::get("home", "home");
});

Route::prefix("/")->controller(UserController::class)->group(function(){
    Route::get("register", "get_register")->middleware("not_user");
    Route::post("register", "post_register")->middleware("not_user");
    Route::get("login", "get_login")->middleware("not_user");
    Route::post("login", "post_login")->middleware("not_user");
    Route::post("logout", "logout")->middleware("user");
});

Route::prefix("/admin")->group(function(){
    Route::get("", [AdminController::class, "dashboard"]);
})->middleware("admin");
