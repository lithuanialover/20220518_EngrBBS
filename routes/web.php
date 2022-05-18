<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

//トップページの表示
Route::get('/', [PostController::class, 'index']);
// 投稿
Route::post('/post', [PostController::class, 'post'])->name('todo.create');
//編集
Route::post('/update', [PostController::class, 'update'])->name('bbs.update');

//削除
Route::post('/delete', [PostController::class, 'delete'])->name('bbs.delete');