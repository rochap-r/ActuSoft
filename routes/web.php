<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
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

Route::get('/about',AboutController::class)->name('about');

Route::get('/contact', [ContactController::class,'create'])->name('contact.create');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');

require __DIR__.'/auth.php';
