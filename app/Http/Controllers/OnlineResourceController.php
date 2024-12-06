<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;  // Corrected to Notifications
use App\Models\Resources;  // Corrected to Notifications
use App\Models\Articles;  // Corrected to Notifications

class OnlineResourceController extends Controller
{
    public function index()
    {
        // Fetch all notifications for all users
        $notifications = Notifications::all();  // Corrected to Notifications
        $resources = Resources::all();  // Corrected to Notifications
        $articles = Articles::all();  // Corrected to Notifications


        // Pass resources, articles, and notifications to the view
        return view('student.online-resources', compact('resources', 'articles', 'notifications'));
    }
}
