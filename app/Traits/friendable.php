<?php

namespace  App\Traits ;

use App\Amies ; 
use App\User ; 

trait friendable
{

public function add_friend($user_requested)
{

    if($this->id === $user_requested)
    {
        return 0 ; 
    }

    if($this->is_friend_with($user_requested))
    {
        return 'already friend' ; 
    }

    if($this->has_pending_friend_request_sent_to($user_requested) === 1 )
    {
        return 'already sent a friend request';
    }

    $invitation = new Amies ; 
    $invitation->user_id = $this->id ; 
    $invitation->friend_id = $user_requested ;
    $invitation->save();

    if($invitation->save())
    {
        return 1;
    }

    return 0;


}


public function accept_friend($requester)
{
    if($this->has_pending_friend_request_from($requester) === 0)
    {
        return 0 ;
    }




    $accept_invitation = Amies::where('user_id',$requester)
                                    ->where('friend_id',$this->id)
                                    ->first();    

    $accept_invitation->status = 1;
    $accept_invitation->save();
    return ($accept_invitation->save()) ? 1 : 0 ;

}

public function friends()
{
    $friends_requester= array();
    $friend_requester = Amies::where('status',1)
                                        ->where('user_id',$this->id)->get(); 


   foreach($friend_requester as $friendship):
    array_push($friends_requester,User::find($friendship->friend_id));

   endforeach;



   $friends_requested= array();
   $friend_requested = Amies::where('status',1)
                                       ->where('friend_id',$this->id)->get(); 


  foreach($friend_requested as $friendship):
   array_push($friends_requested,User::find($friendship->user_id));

  endforeach;


  return array_merge($friends_requester,$friends_requested);



}


public function pending_friend_requests()
{
    $users = [];


    $users_request = Amies::where('status',0)
                                ->where('friend_id',$this->id)
                                ->get();

    foreach($users_request as $user ):

        array_push($users,User::find($user->user_id));

    endforeach;

    return $users ; 
}


public function pending_friend_requests_sent()
{
    $users = [];


    $users_request = Amies::where('status',0)
                                ->where('user_id',$this->id)
                                ->get();

    foreach($users_request as $user ):

        array_push($users,User::find($user->friend_id));

    endforeach;

    return $users ; 
}




public function ids()
{
    return collect($this->friends())->pluck('id')->toArray();
}


public function is_friend_with($user_id)
{
    return  in_array($user_id , $this->ids()) ? 1 : 0;
}


public function pending_friend_requests_ids()
{
    return collect($this->pending_friend_requests())->pluck('id')->toArray();
}

public function pending_friend_requests_sent_ids()
{
    return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
}

 
public function has_pending_friend_request_from($user_id)
{
 //return in_array($user_id,$this->pending_friend_requests_ids()) ? response()->json('true',200) : response()->json('false',404);
return in_array($user_id,$this->pending_friend_requests_ids()) ? 1 : 0 ;
}

public function has_pending_friend_request_sent_to($user_id)
{
    return in_array($user_id,$this->pending_friend_requests_sent_ids()) ? 1 : 0;
}










}