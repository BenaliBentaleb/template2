<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ; 
use App\User ; 
use App\Notifications\NewFriendRequest ;
use App\Notifications\FriendRequestAccepted;

class AmiesController extends Controller 
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check($id)
    {
        if(Auth::user()->is_friend_with($id) === 1)
        {
            return ['status'=>'friend'] ; 
        }

        if(Auth::user()->has_pending_friend_request_from($id) === 1 )
        {
            return ['status'=>'pending'];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id) === 1 )
        {
            return ['status'=>'waiting'];
        }

        return ['status'=>0];
     }


public function add_friend($id)
{
     $response =  Auth::user()->add_friend($id);
       User::find($id)->notify(new  NewFriendRequest(Auth::user()) );

     return $response ;
}

public function accept_friend($id)
{
    $response =  Auth::user()->accept_friend($id);
    User::find($id)->notify( new FriendRequestAccepted(Auth::user()));
    return $response ;
}




}
