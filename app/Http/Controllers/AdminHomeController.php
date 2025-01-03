<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
        // Fetch the logged-in user's username
        $username = Auth::user()->username;

        // Fetch total user count
        $userCount = User::count();

        // Fetch total feedback count
        $feedbackCount = Feedback::count();

        // Fetch total notifications count
        $notificationCount = Notifications::count();

        // Fetch user count grouped by year (from the `created_at` column)
        $userStats = User::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
            ->whereBetween('created_at', ['2023-01-01', '2025-12-31'])
            ->groupBy('year')
            ->pluck('count', 'year')
            ->toArray(); // Convert to an array for easier manipulation

        // Prepare years and ensure all years (2023-2025) are accounted for
        $years = range(2023, 2025);
        $userData = [];
        foreach ($years as $year) {
            $userData[] = $userStats[$year] ?? 0; // Default to 0 if no users for that year
        }

        // Pass the data to the view
        return view('admin.admin-home', compact('username', 'userCount', 'feedbackCount', 'notificationCount', 'userData', 'years'));
    }
}
