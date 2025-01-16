<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("register_admin", [AuthController::class, "register"]);
Route::get("get_user", [AuthController::class, "getUser"]);
Route::get("/get_detail_user/{id}",[AuthController::class,"getDetailUser"]);
Route::put("/update_user/{id}",[AuthController::class,"update_user"]);
Route::delete('hapus_user/{id}', [AuthController::class, 'hapus_user']);
Route::post("register_Category", [CategoryController::class, "register"]);
Route::get("get_Category", [CategoryController::class, "getCategory"]);
Route::get("get_detail_Category/{id}", [CategoryController::class, "getDetailCategory"]);
Route::put("update_Category/{id}", [CategoryController::class, "update_Category"]);
Route::delete("hapus_Category/{id}", [CategoryController::class, "hapus_Category"]);
Route::post("register_Movie", [MovieController::class, "register"]);
Route::get("get_Movie", [MovieController::class, "getMovie"]);
Route::get("get_detail_Movie/{id}", [MovieController::class, "getDetailMovie"]);
Route::put("update_Movie/{id}", [MovieController::class, "update_Movie"]);
Route::delete("hapus_Movie/{id}", [MovieController::class, "hapus_Movie"]);


