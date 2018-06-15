<?php

namespace App\Http\Controllers;

use App\Sondage;
use App\SondageChoix;
use App\sondageChoixUser;
use Auth;

class SondageChoixUserController extends Controller
{
    public function store($id)
    {
   //   $moi  = SondageChoix::where('id','<>',$id)->
     /* $sondage = SondageChoix::find($id)->sondage_choix_user;
        if(count($sondage) > 0) {
          foreach($sondage as $s ) {
            $s->where('user_id',Auth::id())->delete();
          }
        }*/


       // $moi = sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id',$id)->sondage_choix->sondage_id;
       $moi  = SondageChoix::find($id)->sondage_id;
     //  dd($moi);
       $sondage = SondageChoix::where('sondage_id',$moi)->get();
     // dd($sondage);
     // return  $sondage->;

       if(count($sondage) > 0) {
        foreach($sondage as $s ) {
          sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id',$s->id)->delete();
         
          
        }
      }
       $sondage_choix_user = new sondageChoixUser;
       $sondage_choix_user->user_id = Auth::id();
       $sondage_choix_user->sondage_choix_id = $id;
       $sondage_choix_user->save();
       return $sondage_choix_user;

       /* $sondage_choix = sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id','<>',$id)->count();
        $sondage_choixMoi = sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id',$id)->count();
        if($sondage_choixMoi > 0) {
          sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id',$id)->delete();
        }

        if ($sondage_choix > 0) {
          sondageChoixUser::where('user_id', Auth::id())->where('sondage_choix_id','<>',$id)->delete();
          $sondage_choix_user = new sondageChoixUser;
          $sondage_choix_user->user_id = Auth::id();
          $sondage_choix_user->sondage_choix_id = $id;
          $sondage_choix_user->save();
          return $sondage_choix_user;
        } else {
            $sondage_choix_user = new sondageChoixUser;
            $sondage_choix_user->user_id = Auth::id();
            $sondage_choix_user->sondage_choix_id = $id;
            $sondage_choix_user->save();
            return $sondage_choix_user;
        }*/

    }

    // $id  howa id ta3  sondage_choix
    public function get_votes_percentage_users($id)
    {

        $sondage_choix = sondageChoixUser::where('sondage_choix_id', $id)->count(); // 1
        //  return $sondage_choix;
        $sondage_id = SondageChoix::find($id);
        $nombre_users = SondageChoix::where('sondage_id', $sondage_id->sondage_id)->count();
        $choixs = Sondage::where('id', $sondage_id->sondage_id)->first(); //->sondage_choix;
        $ch = 0;
        //    foreach($choixs as $choix) {//3
        foreach ($choixs->sondage_choix as $cho) {
            $ch += $cho->sondage_choix_user->count(); //$cho::where('sondage_id',$sondage_id->sondage_id)->count();
        }
        //  }

        //   $percentage = ($sondage_choix * 100) /  $nombre_users ;
        if ($ch > 0) {
            $percentage = ($sondage_choix * 100) / $ch;
            return $percentage;
        }
        return 0;

    }
}
