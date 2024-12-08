<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class AdminNotificationsController extends Controller
{
    // Display the notifications page
    public function index()
    {
        // Fetch all active notifications
        $notifications = Notifications::with('user')->get();

        return view('admin.admin-notifications', compact('notifications'));
    }

    // Store a new notification
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new notification with the current user's ID
        Notifications::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'added_by_user_id' => auth()->id(),  // Store the current user's ID
        ]);

        // Redirect back with success message
        return redirect()->route('admin.notifications')->with('success', 'Notification added successfully!');
    }

    // Delete an existing notification
    public function destroy($id)
    {
        // Find the notification by ID and delete it
        $notification = Notifications::findOrFail($id);
        $notification->delete();

        // Redirect back with success message
        return redirect()->route('admin.notifications')->with('success', 'Notification deleted successfully!');
    }
}
