<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinyMceController extends Controller
{
    public function upload_tinymce_image()
    {
        $file=request()->file('file');
        //$filename=$file->getClientOriginalName();
        // $path=$file->storeAs('tinymce_uploads',$filename,'public');
        //il va generer le nom lui meme
        $path=$file->store('tinymce_uploads','public');
        return response()->json(['location'=>"/storage/$path"]);
    }
}
