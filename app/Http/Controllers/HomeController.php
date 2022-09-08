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
        //get side recent posts 3:54| 11:43
        $posts=Post::latest()
            ->approved()
            //->where('approved',1)
            ->withCount('comments')->paginate(7);
        $recent_posts=Post::latest()->approved()->take(5)->get();
        $tags=Tag::latest()->take(15)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();

        return view('home',[
                    'posts'=>$posts,
                    'recent_posts'=>$recent_posts,
                    'categories'=>$categories,
                    'tags'=>$tags
        ]);
    }
}
