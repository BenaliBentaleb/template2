<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Formation;


class Event extends Model
{
   protected $fillable  = [
            'user_id',
            'titre',
            'contenu',
            'description',
            'formation_id',
            'is_archived',
            'event_role',
            'debut',
            'fin'
   ];

   public function user() {
       return $this->belongsTo(User::class);
   }

   public function formation() {
    return $this->belongsTo(Formation::class);
}


    public static  function AllArchived($events){
        $events->toArray();
        //dd($events);
        foreach($events as $e){
            if($e->is_archived == 0){
                return false;    
            }
        }
        return true;
        /* $events->toArray();
        //dd($events);
        for($i = 0 ; $i < count($events); $i++){
            //dd($i);
            //dd($events[$i]);
            //dd($events[$i]->is_archived);
            
            if($events[$i]->is_archived == 0){
                return false;    
            }
        }
        return true; */
    }
    

}
