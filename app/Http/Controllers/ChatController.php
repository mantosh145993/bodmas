<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatbot;
use App\Models\Message;

class ChatController extends Controller
{

    public function chatWidgets()
    {
        $messages = '';
        return view('front.widgets.chatbot', ['messages' => $messages]);
    }
    
    public function createChat(Request $request)
    {
        $request->validate([
            'txt' => 'required|string'
        ]);
        $txt = $request->input('txt');
        $reply = Chatbot::where('question', 'like', "%$txt%")->first();
        $html = $reply ? $reply->reply : "Sorry, I am not able to understand you.";
        Message::create(['message' => $txt, 'added_on' => now(), 'type' => 'user']);
        Message::create(['message' => $html, 'added_on' => now(), 'type' => 'bot']);
        return response()->json(['reply' => $html]);
    }
  
    public function index()
    {
        $message = Chatbot::OrderBy('id','desc')->paginate(20);
        return view('admin.chatbot.chat_list', ['messages' => $message]);
    }

    public function create()
    {
        return view('admin.chatbot.chat_create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'reply' => 'required|string'
        ]);
        $message = Chatbot::create($validatedData);

        return response()->json(['message' => 'Question & Reply created successfully.', 'message' => $message]);
    }
    
    public function show(string $id)
    {
        $message = Chatbot::where('id', $id)->firstOrFail();
        return view('admin.chatbot.chat_view', compact('message'));
    }

    public function edit(string $id)
    {
        $chat = Chatbot::findOrFail($id);
        return view('admin.chatbot.chat_edit', compact('chat'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'question' => 'string|max:255',
            'reply' => 'string'
        ]);
        $message = Chatbot::findOrFail($id);
        $message->update($validatedData);
        // dd($message);
        return response()->json(['message' => 'Question & Reply updated successfully.', 'data' => $message]);
    }
    
    public function destroy(string $id)
    {
        $chat = Chatbot::findOrFail($id);
        $chat->delete();
        return redirect()->route('chat.chat_list')->with('success', 'Question deleted successfully!');
    }
}
