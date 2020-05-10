<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatEvent;
use App\Message;

class MessageController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index() {
    	return view('chat/chatbox');
    }

    public function getMessages(\App\Room $room) {
        $messages = Message::where('room_id', $room->id) 
                            ->with('user')
                            ->get();
    	return $messages;
    }

    public function sendMessage(Request $request) {
    	$user = auth()->user();
    	$message = $user->messages()->create( $request->validate([
    		'message' => 'required',
            'room_id' => 'required',
    	]));

    	$message->load('user');

    	broadcast(new ChatEvent($message, $message->room->id))->toOthers();

    	return ['status' => 'Message Sent'];
    }
}
