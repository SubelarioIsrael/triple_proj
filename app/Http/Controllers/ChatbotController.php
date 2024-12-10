<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('student.chatbot', compact('user'));
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $userMessage = $request->input('message');
        $response = "You said: " . $userMessage; // Replace with chatbot logic

        // Get existing messages or initialize an empty array
        $messages = session('messages', []);

        // Add user message and chatbot response to the conversation
        $messages[] = ['sender' => 'user', 'text' => $userMessage];
        $messages[] = ['sender' => 'bot', 'text' => $response];

        // Store the updated messages in the session
        session(['messages' => $messages]);

        return redirect()->route('student.chat');
    }
    public function clearMessages()
    {
        session()->forget('messages'); // Clears the messages from the session
        return redirect()->route('student.chat'); // Redirect back to the chatbot page
    }

}
