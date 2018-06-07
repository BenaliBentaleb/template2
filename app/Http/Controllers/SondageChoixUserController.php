<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\sondageChoixUser;
use App\SondageChoix;
use App\Sondage;

class SondageChoixUserController extends Controller
{
   public function store($id) {

      $sondage_choix = SondageChoix::find($id);
      $sondage_choix_user = new  sondageChoixUser;
      $sondage_choix_user->user_id	=Auth::id(); 
      $sondage_choix_user->sondage_choix_id	= $id;
     $sondage_choix_user->save();
    // return  $this-> get_votes_percentage_users($id);
     // return $sondage_choix_user;
   }


   // $id  howa id ta3  sondage_choix 
   public function get_votes_percentage_users($id) {

    $sondage_choix = sondageChoixUser::where('sondage_choix_id',$id)->count(); // 1
  //  return $sondage_choix;
       $sondage_id = SondageChoix::find($id);
       $nombre_users = SondageChoix::where('sondage_id',$sondage_id->sondage_id)->count();
       $choixs = Sondage::where('id',$sondage_id->sondage_id)->get();//->sondage_choix;
       $ch = 0;
       foreach($choixs as $choix) {//3
           foreach($choix->sondage_choix as $cho) {
            $ch += $cho->sondage_choix_user->count(); //$cho::where('sondage_id',$sondage_id->sondage_id)->count();
           }
       }
      
     //   $percentage = ($sondage_choix * 100) /  $nombre_users ;
        $percentage = ($sondage_choix * 100) /  $ch ;
        return $percentage;
        
   }
}
