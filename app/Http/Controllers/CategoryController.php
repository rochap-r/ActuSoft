<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index',[
           'categories'=>Category::withCount('posts')->paginate(25)
        ]);
    }

    public function show(Category $category)
    {
        $recent_posts=Post::latest()->approved()->take(5)->get();
        $tags=Tag::latest()->take(15)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();
        return view('categories.show',[
            'categories'=>$categories,
            'recent_posts'=>$recent_posts,
            'tags'=>$tags,
            'category'=>$category,
            'posts'=>$category->posts()->withCount('comments')->where('posts.approved',1)->paginate(10)
        ]);
    }
}
