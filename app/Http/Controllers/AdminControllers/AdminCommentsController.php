<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{

    private $rules=[ 'post_id'=>'required|numeric','body'=>'required|min:3|max:1000' ];

    public function index()
    {
        return view('admin_dashboard.comments.index',[
            'comments'=>Comment::latest()->orderBy('post_id')->paginate(50),
        ]);
    }


    public function create()
    {
        return view('admin_dashboard.comments.create',[
           'posts'=>Post::pluck('title','id'),
        ]);
    }


    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        $validated['user_id']=auth()->id();
        Comment::create($validated);
        return redirect()->route('admin.comments.create')->with('success','Votre Commentaire a été créé avec success!');
    }

    public function show($id)
    {
        //
    }


    public function edit(Comment $comment)
    {
        return view('admin_dashboard.comments.edit',[
            'posts'=>Post::pluck('title','id'),
            'comment'=>$comment
        ]);
    }


    public function update(Request $request,Comment $comment)
    {
        //same ule
        $validated=$request->validate($this->rules);
        $comment->update($validated);
        return redirect()->route('admin.comments.index')->with('success','Votre Commentaire a été mis à jour avec success!');
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success','Votre Commentaire a été supprimé avec success!');
    }
}
