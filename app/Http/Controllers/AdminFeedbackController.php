<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all(); // Fetch all feedback data
        return view('admin.admin-feedback', compact('feedbacks'));
    }

    public function delete($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            $feedback->delete();
            return redirect()->route('admin.feedback')->with('success', 'Feedback deleted successfully.');
        }

        return redirect()->route('admin.feedback')->with('error', 'Feedback not found.');
    }

    public function deleteAll()
    {
        Feedback::truncate(); // Deletes all feedback records
        return redirect()->route('admin.feedback')->with('success', 'All feedback deleted successfully.');
    }
}
