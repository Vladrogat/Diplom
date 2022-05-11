<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\QuestionController;
use \App\Http\Controllers\SectionController;
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
 * Маршруты гет-запросов перехода между страницами
 */
Route::controller(PageController::class)->group(function () {
    Route::get('/', "home")->name('home');
    Route::get('/theory', "theory")->name('theory');
});

//Route::controller(QuestionController::class)->group(function () {

    Route::resource('sections/question', QuestionController::class);

//});

Route::controller(SectionController::class)->group(function () {
    Route::get('/sections', "index")->name('sections.index');
    Route::get('/sections/{section}', "show")->name('sections.show');
});
/*
 * Маршруты пост-запросов аутентификации
 */
Route::controller(AuthController::class)->group( function () {

    Route::post("/login", "login")->name("login");
    Route::post("/registration", "registration")->name("registration");
    Route::get("/logout", "logout")->name("logout");
});

/*
 * Маршруты закрытые от неавторизованного пользователя
 */
Route::middleware(["auth"])->group(function () {

    Route::get('/profile/{user}', [AuthController::class, "profile"])->name('profile');

});


