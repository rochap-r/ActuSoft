<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.tags.index',[
            'tags'=>Tag::withCount('posts')->paginate(50),
        ]);
    }
    public function show(Tag $tag)
    {
        return view('admin_dashboard.tags.show',[
            'tag'=>$tag,
        ]);
    }

    public function destroy(Tag $tag)
    {
        //test du fonctionnement es la suppresion des d'un tag
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success','le Tag a bien été supprimée');
    }
}
