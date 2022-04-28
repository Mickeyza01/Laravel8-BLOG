<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('blog', [PostController::class, 'index']);
Route::get('add-blog', [PostController::class, 'create']);
Route::post('add-blog', [PostController::class, 'store']);
Route::get('show-blog/{id}', [PostController::class, 'show']);
Route::get('edit-blog/{id}', [PostController::class, 'edit']);
Route::put('update-blog/{id}', [PostController::class, 'update']);
Route::get('delete-blog/{id}', [PostController::class, 'destroy']);
