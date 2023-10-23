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

Route::get('/',[\App\Http\Controllers\TopicController::class, 'index'])->name('topics.index');

Route::resource('topics',\App\Http\Controllers\TopicController::class)->except(['index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/comments/{topic}', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::post('/commentsReply/{comment}', [App\Http\Controllers\CommentController::class, 'storeCommentReply'])->name('comments.storeReply');
