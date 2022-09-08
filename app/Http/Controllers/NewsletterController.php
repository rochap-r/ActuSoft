<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter\NewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        return Newsletter::store($request);
    }
}
