<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MoodHistory;
use App\Models\Notifications; // Add Notifications model

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
}
