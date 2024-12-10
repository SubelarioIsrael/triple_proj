<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterVoiceController extends Controller
{
    public function index()
    {
        return view('auth.register-voice');
    }
}
