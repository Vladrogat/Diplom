<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ChapterController;
use \App\Http\Controllers\PageController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\QuestionController;
use \App\Http\Controllers\SectionController;

/*
 * Маршруты гет-запросов перехода между страницами
 */
Route::controller(PageController::class)->group(function () {
    Route::get('/', "home")->name('home');
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

    Route::get('/theory', [PageController::class, "theory"])->name('theory');

    Route::controller(QuestionController::class)->group(function () {
		Route::get('chapters/{chapter}/get_questions',  "indexChapter")->name("question.indexChapter");
		Route::post('chapters/{chapter}/question/result', "resultChapter")->name("question.resultChapter");
        Route::get('chapters/{chapter}/questions', "showChapter")->name("question.showChapter");

		
        Route::get('sections/{section}/get_questions',  "index")->name("question.index");
        Route::get('sections/{section}/questions', "show")->name("question.show");
        Route::post('sections/{section}/question/result', "result")->name("question.result");
    });

    Route::controller(ChapterController::class)->group(function () {
        Route::get('/chapters/{chapter}', "show")->name('chapters.show');
    });

    Route::controller(SectionController::class)->group(function () {
        Route::get('/sections', "index")->name('sections.index');
        Route::get('/sections/{section}', "show")->name('sections.show');
    });

    Route::get('/profile/{user}', [AuthController::class, "profile"])->name('profile');

});


