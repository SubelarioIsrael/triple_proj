<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

class HomeController extends Controller
{
    // HomeController.php
    public function index()
    {
        // Fetch all notifications (not filtered by user)
        $notifications = Notifications::all();

        // Pass notifications to the view
        return view('student.home', compact('notifications'));
    }

}
