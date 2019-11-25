<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact extends Controller
{
    public function newContactForm()
    {
        return view('contact.index');
    }
}
