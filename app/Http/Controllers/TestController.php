<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Chatbot;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = '';
        return view('front.widgets.chatbot', ['messages' => $messages]);
    }
    
    public function create(Request $request)
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
