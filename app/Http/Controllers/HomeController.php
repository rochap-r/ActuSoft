<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //get side recent posts 3:54
        $posts=Post::withCount('comments')->paginate(7);
        $recent_posts=Post::latest()->take(5)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();
        $tags=Tag::latest()->take(15)->get();
        return view('home',[
                    'posts'=>$posts,
                    'recent_posts'=>$recent_posts,
                    'categories'=>$categories,
                    'tags'=>$tags
        ]);
    }
}
