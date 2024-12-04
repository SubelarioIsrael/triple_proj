<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        // Get the authenticated admin (if needed)
        $admin = Auth::user();

        $feedbacks = Feedback::all(); // Fetch all feedback data
        // Pass the feedback data to the view
        return view('admin.admin-feedback', compact('admin', 'feedbacks'));
    }
}
