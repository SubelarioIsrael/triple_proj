<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('student.feedback');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5', // Changed from 'satisfaction' to 'rating'
            'subject' => 'required|string',
            'feedback' => 'required|string',
        ]);

        // Store feedback into the database or send it wherever necessary
        // Example: Feedback saved into a hypothetical 'feedbacks' table
        \App\Models\Feedback::create([
            'user_id' => Auth::id(),
            'rating' => $validatedData['rating'],
            'subject' => $validatedData['subject'],
            'feedback' => $validatedData['feedback'],
        ]);

        // Redirect back with a success message
        return redirect()->route('student.home')->with('success', 'Thank you for your feedback!');
    }
}
