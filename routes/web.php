<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\AuthController;
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


/*
 * Маршруты гет запросов перехода между страницами
 */
Route::get('/', [PageController::class, "home"])->name('home');
Route::get('/theory', [PageController::class, "theory"])->name('theory');
//Route::get('/add', [PageController::class, "add"])->name('add');

Route::get('/profile/{user}', [PageController::class, "profile"])->middleware("auth")->name('profile');

/*
 * Маршруты пост запросов аутентификации
 */
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");
Route::post("/regis", [AuthController::class, "regis"])->name("regis");
