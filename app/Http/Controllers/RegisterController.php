<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Ensure the confirmation field matches
        ]);

        // Create the user with 'type' set to 'student'
        User::create([
            'username' => $request->username,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => $request->password, // The mutator will hash it automatically
            'type' => 'student', // Default type for new accounts
        ]);

        // Redirect to login or dashboard
        return redirect()->route('authentication.register-voice')->with('success', 'Registration successful. Please log in.');
    }

}
