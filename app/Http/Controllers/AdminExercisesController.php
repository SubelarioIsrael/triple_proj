<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercises;

class AdminExercisesController extends Controller
{
    // Show the list of exercises
    public function index()
    {
        $exercises = Exercises::all();
        return view('admin.admin-exercises', compact('exercises'));
    }

    // Show the edit form for an exercise
    public function edit(Exercises $exercise)
    {
        return view('admin.edit-exercise', compact('exercise'));
    }

    // Update an exercise in the database
    public function update(Request $request, Exercises $exercise)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inhale_time' => 'required|integer|min:1',
            'hold_time' => 'required|integer|min:1',
            'exhale_time' => 'required|integer|min:1',
            'instructions' => 'nullable|string',
        ]);

        // Update the exercise with validated data
        $exercise->update($validated);

        return redirect()->route('admin.exercises')->with('success', 'Exercise updated successfully!');
    }
    // Store the new exercise in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inhale_time' => 'required|integer|min:1',
            'hold_time' => 'required|integer|min:1',
            'exhale_time' => 'required|integer|min:1',
            'instructions' => 'nullable|string',
        ]);

        // Create a new exercise using the validated data
        Exercises::create($validated);

        // Redirect to the exercises index page with a success message
        return redirect()->route('admin.exercises')->with('success', 'Exercise added successfully!');
    }
    // Show the form for creating a new exercise
    public function create()
    {
        return view('admin.create-exercise');
    }
}