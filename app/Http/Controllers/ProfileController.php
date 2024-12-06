<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MoodHistory;
use App\Models\Notifications; // Add Notifications model
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch mood history, group by exact created_at, and sum scores for each timestamp
        $moodHistoryWithBreathing = MoodHistory::where('user_id', $user->id)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as timestamp, SUM(score) as total_score') // Group by exact timestamp, and sum the scores
            ->groupBy('timestamp') // Group by the formatted timestamp
            ->orderBy('timestamp', 'desc') // Sort by most recent timestamp
            ->get();

        // Fetch all notifications for all users
        $notifications = Notifications::all(); // Fetch notifications

        // Pass the data to the view
        return view('student.profile', compact('user', 'moodHistoryWithBreathing', 'notifications')); // Pass notifications
    }
    public function update(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'contact_number' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update the authenticated user's profile
        $user = Auth::user(); // Ensure this returns a User instance
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->contact_number = $validatedData['contact_number'];

        // Update password only if provided
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save(); // Save user data

        // Redirect back with a success message
        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }


}
