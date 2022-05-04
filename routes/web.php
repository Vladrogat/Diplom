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
Route::controller(PageController::class)->group(function () {

    Route::get('/', "home")->name('home');
    Route::get('/theory', "theory")->name('theory');

});

/*
 * Маршруты пост запросов аутентификации
 */
Route::controller(AuthController::class)->group( function () {

    Route::post("/login", [AuthController::class, "login"])->name("login");
    Route::post("/regis", [AuthController::class, "regis"])->name("regis");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});

/*
 * Маршруты закрытые от неавторизованного пользователя
 */
Route::middleware(["auth"])->group(function () {

    Route::get('/profile/{user}', [AuthController::class, "profile"])->name('profile');

});


