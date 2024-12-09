<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AccountsController extends Controller
{
    public function index()
    {
        // Fetch students
        $students = User::where('type', 'student')->get();

        // Fetch admins
        $admins = User::where('type', 'admin')->get();

        // Pass data to the view
        return view('admin.admin-accounts', compact('students', 'admins'));
    }
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User removed successfully.');
    }
    // Delete all student accounts
    public function destroyAllStudents()
    {
        // Delete all users with the type 'student'
        User::where('type', 'student')->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'All student accounts have been deleted.');
    }
}
