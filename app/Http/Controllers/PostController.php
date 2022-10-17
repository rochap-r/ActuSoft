<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function addComment(Post $post){
        
        $attributes=request()->validate([ 
            'name' => 'required', 'string',
            'email' =>'required', 'email', 'unique:user_comments',
            'body'=> ' required|min:3|max:350', 
        ]);
        $email=request()->input(['email']);
        
        $user=UserComment::where('email',[$email])->first();

        if($user==null){
            $name=request()->name;
            $user=UserComment::create([ 'name'=>$name,'email'=>$email  ]);
            $attributes['user_comment_id']=$user->id;
        }else{
            $attributes['user_comment_id']=$user->id;
        }
        $comment=$post->comments()->create($attributes);

        $user=UserComment::where('email',[$email])->first();
       // return back(); redirige vers la meme page
       //#comment_ id sur post section commentaire affiche le dernier commentaire correspondant à cet 
        Cookie::queue('User',$user,120);
        Cookie::queue('user_name',$user->name,120);
        Cookie::queue('user_email',$user->email,120);
        
       return redirect('/post/'. $post->slug . '#comment_' . $comment->id)->with('succes',' Le Commentaire a bien été ajouté ');
    }



    public function show(Post $post)
    {
        //dd($post->comments->author);
        $recent_posts=Post::latest()->approved()->take(5)->get();
        $categories=Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();
        $tags=Tag::latest()->take(15)->get();
            return view('post',[
                'post'=>$post,
                'recent_posts'=>$recent_posts,
                'categories'=>$categories,
                'tags'=>$tags
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
