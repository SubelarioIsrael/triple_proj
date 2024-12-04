<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;  // Corrected to Notifications

class FeedbackController extends Controller
{
    public function index()
    {
        // Fetch all notifications for all users
        $notifications = Notifications::all();  // Corrected to Notifications

        // Pass notifications to the view
        return view('student.feedback', compact('notifications'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'subject' => 'required|string',
            'feedback' => 'required|string',
        ]);

        // Store feedback into the database
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
