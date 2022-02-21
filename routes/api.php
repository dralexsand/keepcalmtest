<?php

use App\Http\Controllers\Api\v1\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::post('comments', [CommentController::class, 'ajaxStore'])
            ->name('store');

        Route::get('show_more', [CommentController::class, 'showMore'])
            ->name('show_more');

        Route::post('search_comment', [CommentController::class, 'searchComment'])
            ->name('search_comment');

        Route::post('ajax_select', [CommentController::class, 'ajaxSelect'])
            ->name('ajax_select');
    });
});*/


