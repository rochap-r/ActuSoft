<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {

    }

    public function show(Tag $tag)
    {
        $recent_posts=Post::latest()->take(5)->get();
        $tags=Tag::latest()->take(15)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();
        return view('tags.show',[
            'tag'=>$tag,
            'recent_posts'=>$recent_posts,
            'tags'=>$tags,
            'categories'=>$categories,
            'posts'=>$tag->posts()->paginate(7)
        ]);
    }
}
