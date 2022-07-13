<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public $rules=[
                'title'=>'required|max:250',
                'slug'=>'required|max:250',
                'excerpt'=>'required|max:300',
                'category_id'=>'required|numeric',
                'thumbnail'=>'required|file|mimes:jpg,png,webp;svg,jpeg',
                'body'=>'required',
        ];
    public function index()
    {
        return view('admin_dashboard.posts.index',[
            'posts'=>Post::with('category')->get(),
        ]);
    }

    public function create()
    {
        return view('admin_dashboard.posts.create',[
            'categories'=>Category::pluck('name','id'),
        ]);
    }

    public function store(Request $request)
    {
        $validated=$request->validate($this->rules);
        $validated['user_id']=auth()->id();
        //dd($validated);
        $post=Post::create($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            //création de l'image de l'article
            $post->image()->create([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }
        return redirect()->route('admin.posts.index')->with('success','Votre Article a bien été créé!');

    }

    public function show($id)
    {
        //
    }


    public function edit(Post $post)
    {
        return view('admin_dashboard.posts.edit',[
            'post'=>$post,
            'categories'=>Category::pluck('name','id'),
        ]);
    }


    public function update(Request $request, Post $post)
    {
        //la maj de la photo n'est obligatoire
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp;svg,jpeg';

        $validated=$request->validate($this->rules);

        //dd($validated);
        $post->update($validated);
        if ($request->has('thumbnail')){
            $thumbnail=$request->file('thumbnail');
            $path=$thumbnail->store('images','public');
            $fileName=$thumbnail->getClientOriginalName();
            $extension=$thumbnail->getClientOriginalExtension();
            //création de l'image de l'article
            $post->image()->update([
                'name'=>$fileName,
                'extension'=>$extension,
                'path'=>$path
            ]);
        }
        return redirect()->route('admin.posts.index',$post)->with('success','Votre Article a bien été mis à jour!');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','L\'article a été supprimé avec succès!');
    }
}
