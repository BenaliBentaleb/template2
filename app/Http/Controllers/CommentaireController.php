<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Publication;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $commentaire = new Commentaire;
        $commentaire->publication_id = $request->publication_id;
        $commentaire->user_id = Auth::id();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->save();

        $comment = Commentaire::find($commentaire->id);
        $publication = Publication::find($request->publication_id);

        // send me notification if some one comment my status and not me
  

            if($comment->user->id != $publication->user->id &&  $publication->isFollewed($publication->id,$comment->user->id) ){
                User::find($publication->user->id)->notify(new \App\Notifications\SuivieNotification($comment));

            }

        $suivies = array();
        foreach ($publication->suivies as $s) {
           
            
            if ($s->user_id != $comment->user->id  ) {
                User::find($s->user_id)->notify(new \App\Notifications\SuivieNotification($comment));
               
            }else {
                User::find($publication->user->id)->notify(new \App\Notifications\SuivieNotification($comment));

            }
        }

        return $comment;
    }

    public function allcomment($id)
    {
        $publication = Publication::find($id);
        $comments = [];
        foreach ($publication->commentaires as $c) {

            array_push($comments, $c);
        }

        return $comments;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment = Commentaire::find($id);
        $comment->delete();
        return $comment;
    }
}
