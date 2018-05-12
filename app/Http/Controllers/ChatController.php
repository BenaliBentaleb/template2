<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use Auth;
use App\Notifications\NewMessageNotification ;

class ChatController extends Controller
{
 /* public function getchat() {
      return view('chat');
  }*/

  public function index()
  {
      $friends = Auth::user()->friends();
     // dd(Auth::user()->withFriends($friends));
      return view('chat')->withFriends($friends) ->with('profile',Auth::id())
      ->with('chat',$friends);
  }

  public function show($id)
  {
      $friend = User::find($id);
      return view('chat.show')->withFriend($friend);
  }

  public function getChat($id) {
      $chats = Chat::where(function ($query) use ($id) {
          $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);
      })->orWhere(function ($query) use ($id) {
          $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);
      })->get();
      return $chats;
  }
  
  public function sendChat(Request $request) {
      Chat::create([
          'user_id' => $request->user_id,
          'friend_id' => $request->friend_id,
          'chat' => $request->chat
      ]);

     // $response =  Auth::user()->add_friend($id);
       User::find($request->friend_id)->notify(new  NewMessageNotification(Auth::user()) );

    // return $response ;
      
      return [];
  }
}
