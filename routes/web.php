<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

//NEXT VIDEO IS FOR ABOUT START

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class,'show'])->name('post.show');
Route::post('/post/{post:slug}', [PostController::class,'addComment'])->name('post.add_comment');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

require __DIR__.'/auth.php';
