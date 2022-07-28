<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{

    public function edit()
    {
        return view('admin_dashboard.setting.edit',[
            'setting'=>Setting::find(1)
        ]);
    }

    public function update()
    {
        $validated= request()->validate([
            'about_first_text' => 'required|min:50,max:500',
            'about_second_text' => 'required|min:50,max:500',
            'about_first_image' => 'nullable|file|image',
            'about_second_image' =>  'nullable|image',
            'about_our_mission' => 'required',
            'about_our_vision' => 'required',
            'about_our_service' =>'required'
        ]);

        if (request()->has('about_first_image')){
            $about_first_image=request()->file('about_first_image');
            $path=$about_first_image->store('setting','public');
            $validated['about_first_image']=$path;
        }
        if (request()->has('about_second_image')){
            $about_second_image=request()->file('about_second_image');
            $path=$about_second_image->store('setting','public');
            $validated['about_second_image']=$path;
        }
        Setting::find(1)->update($validated);
        return redirect()->route('admin.setting.edit')->with('success','la page A-propos a bien été mis à jour');
    }
}
