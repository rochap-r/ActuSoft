<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store()
    {
        $attributes=\request()->validate([
            'first_name'=>'required' ,
            'last_name'=>'required' ,
            'email'=>'required' ,
            'subject'=>'nullable|min:10|max:200' ,
            'message'=>'required|min:10|max:500'
        ]);
        Contact::create($attributes);
        Mail::to('rodriguechot@gmail.com')->send(new ContactMail(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['email'],
            $attributes['subject'],
            $attributes['message']
        ));
        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }
        return redirect()->route('contact.create')->with('success','Nous avons reçu votre message avec succès, nous vous répondrons au plus vite.');
    }
}
