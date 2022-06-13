<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminControllers\DashBoardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

//Les Routes coté Utilisateur

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/post/{post:slug}', [PostController::class,'show'])->name('post.show');
Route::post('/post/{post:slug}', [PostController::class,'addComment'])->name('post.add_comment');

Route::get('/about',AboutController::class)->name('about');

Route::get('/contact', [ContactController::class,'create'])->name('contact.create');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');


Route::get('/categories/{category:slug}', [CategoryController::class,'show'])->name('category.show');
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/tags/{tag:slug}', [TagController::class,'show'])->name('tag.show');
require __DIR__.'/auth.php';


// Admin DashBoard Routes
Route::prefix('admin')->name('admin.')->middleware(['auth','isadmin'])->group(function (){
    Route::get('/',[DashBoardController::class,'index'])->name('index');
});

