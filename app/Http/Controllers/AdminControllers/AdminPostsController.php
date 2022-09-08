<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public $rules=[
                'title'=>'required|max:250',
                'slug'=>'required|max:250',
                'excerpt'=>'required|max:300',
                'category_id'=>'required|numeric',
                'thumbnail'=>'required|file|mimes:jpg,png,webp;svg,jpeg|dimensions:max_width=800,max_height=400',
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
        $user=User::with('role')->find(auth()->id());
        if(Role::find($user->role_id)->name==='admin'){
            $validated['approved']=$request->approved !==null;
        }else{
            $validated['approved']=0;
        }
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
        // explose la chaine des cars en tab par la virgule
        $tags=explode(',',$request->input('tags'));
        $tags_id=[];
        foreach($tags as $tag){
            $tag_exist=Tag::where('name',trim($tag))->first();
            $tag_exist_count=Tag::where('name',trim($tag))->count();

            //$tag_exist_for_this_post=$post->tags()->where('name',trim($tag))->count();

            if ($tag_exist_count===0) {
                $tag_obj = Tag::create(['name' => $tag]);
                $tags_id[] = $tag_obj->id;
            }else{
                $tags_id[] = $tag_exist->id;
            }

        }

        //condition simple
        if(count($tags_id)>0)
            $post->tags()->sync($tags_id);

        return redirect()->route('admin.posts.index')->with('success','Votre Article a bien été créé!');

    }

    public function show($id)
    {
        //
    }


    public function edit(Post $post)
    {
        $tags='';
        foreach ($post->tags as $key =>$tag){
            /*  if ($key !== count($post->tags)-1){
                $tags .= $tag->name;
            }else{
                $tags .= $tag->name; ntelem=3 [ 0 1 2]
            }*/
            $tags .= ($key !== count($post->tags)-1) ? $tag->name.',' : $tag->name;
        }
        return view('admin_dashboard.posts.edit',[
            'post'=>$post,
            'tags'=>$tags,
            'categories'=>Category::pluck('name','id'),
            //pluck name to show and id to use
        ]);
    }


    public function update(Request $request, Post $post)
    {
        //la maj de la photo n'est obligatoire
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp;svg,jpeg|dimensions:max_width=800,max_height=400';

        $validated=$request->validate($this->rules);
        $user=User::with('role')->find(auth()->id());
        if(Role::find($user->role_id)->name==='admin'){
            $validated['approved']=$request->approved !==null;
        }else{
            $validated['approved']=0;
        }
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
        // explose la chaine des cars en tab par la virgule
        $tags=explode(',',$request->input('tags'));
        $tags_id=[];
        foreach($tags as $tag){
            $tag_exist=Tag::where('name',trim($tag))->first();
            $tag_exist_count=Tag::where('name',trim($tag))->count();
           //$tag_exist_for_this_post=$post->tags()->where('name',trim($tag))->count();
            if ($tag_exist_count===0) {
                $tag_obj = Tag::create(['name' => $tag]);
                $tags_id[] = $tag_obj->id;
            }else{
                $tags_id[] = $tag_exist->id;
            }

        }
        //condition simple
        if( count($tags_id) > 0)
            //syncWithoutDetaching si une valeur exist laisse le
            $post->tags()->syncWithoutDetaching($tags_id);

        return redirect()->route('admin.posts.index',$post)->with('success','Votre Article a bien été mis à jour!');
    }


    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','L\'article a été supprimé avec succès!');
    }
}
