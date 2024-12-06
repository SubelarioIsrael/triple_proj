<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodTrackQuestions;

class AdminMTQController extends Controller
{
    public function index()
    {

        // Fetch all questions from the mt_questions table
        $questions = MoodTrackQuestions::all(); // Only fetch the question text

        return view('admin.admin-mtq', compact('questions'));
    }
    public function edit($id)
    {
        // Fetch the question by ID
        $question = MoodTrackQuestions::findOrFail($id);

        return view('admin.edit-mtq', compact('question'));
    }
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'q_item' => 'required|string|max:255',
        ]);

        // Find the question by ID
        $question = MoodTrackQuestions::findOrFail($id);

        // Update the question
        $question->q_item = $request->input('q_item');
        $question->save();

        // Redirect back with success message
        return redirect()->route('admin.mtq')->with('success', 'Question updated successfully!');
    }

}
