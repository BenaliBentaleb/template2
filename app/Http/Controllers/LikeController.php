<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Publication;
use Auth ;

class LikeController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }

    public function jaime($id) {
        $publication = Publication::find($id);

        $jaime = new Like;
        $jaime->user_id = Auth::id();
        $jaime->publication_id = $publication->id;
        $jaime->save();
        $l = Like::find($jaime->id);
        return $l;


    }

    public function unjaime($id) {
        $publication = Publication::find($id);
       /* foreach($publication->likes as  $like) {
            foreach($like->user as $user ) {
                if($user->id == Auth::id()) {
                    $like->delete();
                    break;
                }
            }
        }*/

        $like = Like::where('user_id',Auth::id())
                ->where('publication_id',$publication->id)->first();
        $like->delete();

        return $like;


    }
}
