<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;  // Import the Notification model
use App\Models\Exercises;  // Import the Notification model

class ExerciseStartController extends Controller
{
    public function show($name)
    {
        // Decode the name parameter
        $name = urldecode($name);

        // Fetch the exercise from the database using the name
        $exercise = Exercises::where('name', $name)->first();

        // If the exercise is not found, handle the error (e.g., redirect or show a 404 page)
        if (!$exercise) {
            abort(404, 'Exercise not found');
        }

        // Convert the exercise to an array for Blade compatibility
        $exerciseArray = [
            'name' => $exercise->name,
            'inhale_time' => $exercise->inhale_time,
            'hold_time' => $exercise->hold_time,
            'exhale_time' => $exercise->exhale_time,
            'instructions' => $exercise->instructions,
        ];

        // Fetch all notifications for the current user (assuming notifications are for authenticated users)
        $notifications = Notifications::all(); // Update this query as needed based on your logic

        // Pass the exercise array and notifications to the view
        return view('student.exercise_start', compact('exerciseArray', 'notifications'));
    }

}
