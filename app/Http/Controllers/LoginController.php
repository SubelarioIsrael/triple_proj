<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validate request inputs
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'The username field is required.',
            'password.required' => 'The password field is required.',
        ]);

        // Attempt to authenticate using the provided credentials
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->type === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->type === 'student') {
                return redirect()->route('authentication.sign-in-voice')->with('user', $user);
            }

            return back()->withErrors(['role' => 'User role is undefined']);
        } else {
            return back()->withErrors(['password' => 'Password incorrect']);
        }
    }


}
