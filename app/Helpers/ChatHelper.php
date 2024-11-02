<?php

namespace App\Helpers;

use App\Models\Message;
use App\Models\Chatbot;

class ChatHelper
{
    public function chatHelper($text)
    {
        $added_on = now(); 
        $messages = Message::all();
        Message::create([
            'message' => $text,
            'added_on' => $added_on,
            'type' => 'user',
        ]);
        $reply = Chatbot::where('question', 'LIKE', "%$text%")->first();
        if ($reply) {
            $response = $reply->response; 
        } else {
            $response = "Sorry, I am not able to understand you.";
        }
        Message::create([
            'message' => $response,
            'added_on' => $added_on,
            'type' => 'bot',
        ]);
        return view('front.widgets.chatbot', [
            'reply' => $reply,
            'errorMessage' => $response,
            'messages' => $messages 
        ]);
    }

}
