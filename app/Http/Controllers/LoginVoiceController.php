<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginVoiceController extends Controller
{
    public function index()
    {
        // Retrieve user from session
        $user = session('user');

        // Ensure user exists (optional)
        if (!$user) {
            return redirect()->route('authentication.sign-in')->withErrors(['user' => 'No user data found']);
        }

        return view('auth.login-voice', compact('user'));
    }
}