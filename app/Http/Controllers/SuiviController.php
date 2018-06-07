<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Suivi;

class SuiviController extends Controller
{
   
    

    public function suivie($id) {
       
        $suivie = new Suivi;
        $suivie->user_id = Auth::id();
        $suivie->publication_id = $id;
        $suivie->save();
        return $suivie;
      
    }

    public function unsuivie($id)
    {
        $suivie = Suivi::where('publication_id',$id)->where('user_id',Auth::id())->first();;
       
        $suivie->delete();

        return $suivie;
    }

    public function check_user_if_follow_publication($user,$id) {
        $suivie = Suivi::where('publication_id',$id)->where('user_id',$user)->first();
        if($suivie) {
            return 1;
        }
        return 0;
    }



}
