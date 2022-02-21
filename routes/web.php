<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('home');

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/info', [InfoController::class, 'index'])->name('info');

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::post('comments', [CommentController::class, 'ajaxStore'])
            ->name('store');

        Route::post('show_more', [CommentController::class, 'showMore'])
            ->name('show_more');

        Route::post('search_comment', [CommentController::class, 'searchComment'])
            ->name('search_comment');

        Route::post('ajax_select', [CommentController::class, 'ajaxSelect'])
            ->name('ajax_select');
    });
});
