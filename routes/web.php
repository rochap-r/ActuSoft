<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminControllers\AdminCategoryController;
use App\Http\Controllers\AdminControllers\AdminCommentsController;
use App\Http\Controllers\AdminControllers\AdminContactsController;
use App\Http\Controllers\AdminControllers\AdminRolesController;
use App\Http\Controllers\AdminControllers\AdminTagsController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\AdminUsersController;
use App\Http\Controllers\AdminControllers\DashBoardController;
use App\Http\Controllers\AdminControllers\TinyMceController;
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
Route::get('/tags/{tag:name}', [TagController::class,'show'])->name('tag.show');
require __DIR__.'/auth.php';

// Admin DashBoard Routes
Route::prefix('admin')->name('admin.')->middleware(['auth','check_permissions'])->group(function (){
    Route::get('/',[DashBoardController::class,'index'])->name('index');
    Route::resource('posts',AdminPostsController::class);
    Route::resource('categories',AdminCategoryController::class);
    //Route::post('posts',[AdminPostsController::class,'store'])->name('posts.store');
    Route::post('upload_tinymce_image',[TinyMceController::class,'upload_tinymce_image'])->name('upload_tinymce_image');
    Route::resource('tags',AdminTagsController::class)->only(['index', 'show','destroy']);
    Route::resource('comments',AdminCommentsController::class)->except('show');
    //gestion des roles
    Route::resource('roles',AdminRolesController::class)->except('show');
    //administration des users
    Route::resource('users',AdminUsersController::class);
    //mail contact
    Route::get('contacts',[AdminContactsController::class,'index'])->name('contacts.index');
    Route::delete('contacts/{contact}',[AdminContactsController::class,'destroy'])->name('contacts.destroy');
});

