<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource
Route::resource('/students', \App\Http\Controllers\StudentController::class);
Route::resource('/posts', \App\Http\Controllers\PostController::class);