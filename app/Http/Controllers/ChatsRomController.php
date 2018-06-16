<?php

namespace App\Http\Controllers;
use  App\ChatRomMessage;
use App\Events\MessageRomeSent;
use Auth;
use App\User;
use Illuminate\Http\Request;
class ChatsRomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chatRom')->with('profile',Auth::id());
    }

    public function fetchMessages()
    {
        return ChatRomMessage::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->chatRomMessages()->create([
            'message' => $request->input('message'),
        ]);
        broadcast(new MessageRomeSent($user, $message))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
