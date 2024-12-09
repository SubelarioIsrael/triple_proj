<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use Carbon\Carbon;

class AdminNotificationsController extends Controller
{
    // Display the notifications page
    public function index()
    {
        $notifications = Notifications::all()->map(function ($notification) {
            $notification->start_time = Carbon::createFromTimestamp($notification->start_time); // Convert to Carbon
            return $notification;
        });

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
    // Delete all notifications
    public function destroyAll()
    {
        // Delete all notifications
        Notifications::truncate();

        // Redirect back with success message
        return redirect()->route('admin.notifications')->with('success', 'All notifications have been deleted.');
    }
}
