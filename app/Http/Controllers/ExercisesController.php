<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExercisesController extends Controller
{
    public function index() {

        $exercises = array(
            [
                "id" => 1,
                "name" => "Box Breathing",
                "inhale_time" => 4,
                "hold_time" => 4,
                "exhale_time" => 4,

            ],
            [
                "id" => 2,
                "name" => "4-7-8 Breathing",
                "inhale_time" => 4,
                "hold_time" => 7,
                "exhale_time" => 8,
            ],
            [
                "id" => 3,
                "name" => "Balanced Breathing",
                "inhale_time" => 5,
                "hold_time" => 0,
                "exhale_time" => 5,
            ],
            [
                "id" => 4,
                "name" => "Energizing Breathing",
                "inhale_time" => 4,
                "hold_time" => 5,
                "exhale_time" => 3,
            ]
        );

        return view('student.exercises', ['exercises' => $exercises]);

    } 
}
