<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodTrackQuestions;
use App\Models\MoodHistory;
use Illuminate\Support\Facades\Auth;

class MoodTrackController extends Controller
{
    public function index()
    {
        // Fetch all questions from the mt_questions table
        $questions = MoodTrackQuestions::orderBy('id')->pluck('q_item')->toArray(); // Only fetch the question text

        return view('student.track-mood', compact('questions'));
    }

    // public function store(Request $request)
    // {
    //     // Validate the form inputs
    //     $validatedData = $request->validate([
    //         'question*' => 'required|integer|between:1,5', // Ensure all questions are answered
    //     ]);

    //     // Continue storing the data if validation passes
    //     $userId = auth()->id();
    //     foreach ($request->all() as $key => $value) {
    //         if (str_starts_with($key, 'question')) {
    //             $questionId = str_replace('question', '', $key);
    //             MoodHistory::create([
    //                 'user_id' => $userId,
    //                 'question_id' => $questionId,
    //                 'score' => $value,
    //             ]);
    //         }
    //     }

    //     return redirect()->route('student.home')->with('success', 'Mood data saved successfully!');
    // }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'notes' => 'nullable|string',
            'question*' => 'required|integer|between:1,5',
        ]);

        // Get the authenticated user ID (assuming authentication is set up)
        $userId = auth()->id();

        // Create mood history records for each question
        $submissionTime = now(); // Get the current timestamp to group the records

        // Loop through the questions to store each answer
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question')) {
                $questionId = str_replace('question', '', $key); // Extract question index

                // Create a new record for each question
                MoodHistory::create([
                    'user_id' => $userId,
                    'question_id' => $questionId,
                    'score' => $value,
                    'created_at' => $submissionTime, // Group by the same timestamp
                ]);
            }
        }

        return redirect()->route('student.home')->with('success', 'Mood data saved successfully!');
    }





    public function showResults()
    {

        $results = [
            [
                'question' => 'I have been feeling hopeful about the future lately.',
                'response' => 'Slightly Agree',
                'score' => 4,
            ],
            // Add other questions and responses...
        ];

        $totalScore = 21; // Example total score
        $summaryMessage = "It looks like you may be experiencing some challenges. This could be a good time to focus on self-care and consider reaching out for support.";

        return view('student.results', compact('results', 'totalScore', 'summaryMessage'));
    }
}
