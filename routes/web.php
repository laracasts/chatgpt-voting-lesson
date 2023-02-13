<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(2);

Route::redirect('/', '/posts');
Route::resource('posts', PostsController::class);

Route::post('/posts/{postId}/votes', [VoteController::class, 'store'])
    ->name('votes.store')
    ->middleware('auth');

Route::delete('/posts/{postId}/votes', [VoteController::class, 'destroy'])
    ->name('votes.destroy')
    ->middleware('auth');



