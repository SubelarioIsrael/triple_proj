<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MoodHistory;

class ProfileController extends Controller
{
    public function index() {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch mood history, group by exact created_at, and sum scores for each timestamp
        $moodHistory = MoodHistory::where('user_id', $user->id)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as timestamp, SUM(score) as total_score') // Group by exact timestamp, and sum the scores
            ->groupBy('timestamp') // Group by the formatted timestamp
            ->orderBy('timestamp', 'desc') // Sort by most recent timestamp
            ->get();

        // Pass the data to the view
        return view('student.profile', compact('user', 'moodHistory'));
    }
}

