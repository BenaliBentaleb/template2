<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JaimeCommentaire;
use App\Commentaire;
use Auth;
use App\Publication;
class JaimeCommentaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    
    public function jaime($id) {
        $jaimeCommentaire = new  JaimeCommentaire;
        $jaimeCommentaire->commentaire_id = $id;
        $jaimeCommentaire->user_id = Auth::id();
        $jaimeCommentaire->save();

        return JaimeCommentaire::find($jaimeCommentaire->id);
    }

    public function unjaime($id) {
        $like = JaimeCommentaire::where('commentaire_id',$id)
                         ->where('user_id',Auth::id())->first();

        $like->delete();
        return $like;
    }


    public function jaimeComment($id) {
        $pub = Commentaire::find($id);
       
        $a = [];
        foreach($pub->likes as $comment) {
            array_push($a,$comment);
        }
        return $a;

    }

}
