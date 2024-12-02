<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseStartController extends Controller
{
    public function show($name)
    {
        $name = urldecode($name); // Decode the name parameter

        $exercises = [
            "Box Breathing" => [
                "name" => "Box Breathing",
                "inhale_time" => 4,
                "hold_time" => 4,
                "exhale_time" => 4,
                "instructions" => "Breathe in for 4 seconds, hold for 4 seconds, and breathe out for 4 seconds."
            ],
            "4-7-8 Breathing" => [
                "name" => "4-7-8 Breathing",
                "inhale_time" => 4,
                "hold_time" => 7,
                "exhale_time" => 8,
                "instructions" => "Breathe in for 4 seconds, hold for 7 seconds, and exhale slowly for 8 seconds."
            ],
            "Balanced Breathing" => [
                "name" => "Balanced Breathing",
                "inhale_time" => 5,
                "hold_time" => 0,
                "exhale_time" => 5,
                "instructions" => "Breathe in for 5 seconds and exhale for 5 seconds. Keep it steady."
            ],
            "Energizing Breathing" => [
                "name" => "Energizing Breathing",
                "inhale_time" => 4,
                "hold_time" => 5,
                "exhale_time" => 3,
                "instructions" => "Breathe in for 4 seconds, hold for 5 seconds, and exhale sharply for 3 seconds."
            ]
        ];

        if (!array_key_exists($name, $exercises)) {
            abort(404);
        }

        $exercise = $exercises[$name];

        return view('student.exercise_start', compact('exercise'));
    }
}