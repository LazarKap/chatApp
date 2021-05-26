<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminat\Support\Facades\Auth;

// Kontroler koji ce iz modela kupiti sobe i poruke iz baze.

class ChatController extends Controller
{
    public function rooms(Request $request){
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomId){
        return chatMessage::where('chat_room_id', $roomId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newMessage(Request $request, $roomId){
        $newMessage                 = new ChatMessage;
        $newMessage->user_id        = Auth::id();
        $newMessage->chat_room_id   = $roomId;
        $newMessage->messages       = $request->message;

        return $newMessage;

    }

}

