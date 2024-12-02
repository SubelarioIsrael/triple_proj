<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('student.chatbot', compact('user'));
    }
}
