<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ; 
use App\Publication;
use App\Departement;
use App\Profile;

class ProfileController extends Controller
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

    public function profile($id) {
        $user = User::find($id);
        $departement = Departement::all();
        $user_publication=  $user->publications;

        return view('user.profile')->with('user',$user)->with('departement',$departement)
       ->with('publications',$user_publication)
       ->with('profile',$user->id);
    }

    public function get_publication_user(Request $request,$id) {
       
        $user = User::find($id);
        $departement = Departement::all();
        $user_publication = Publication::where('user_id',$id)->where('type',$request->type)->get();
       // dd($user_publication);
        return view('user.profile')->with('user',$user)->with('departement',$departement)
        ->with('publications',$user_publication)
        ->with('profile',$user->id);
    }

    public function upload_picture($id,Request $request) {
        $user = User::find($id);
        $profile = Profile::where('user_id',$user->id)->first();
        $picture = $request->profilepicture;
        $new_picture = time(). $picture->getClientOriginalName();
        $picture->move('uploads/avatars',$new_picture);
        $profile->photo_profile = '/uploads/avatars/'.$new_picture ; 
        $profile->save();
        return redirect()->back();
        

    }

    public function upload_coverture($id,Request $request) {
        $user = User::find($id);
        $profile = Profile::where('user_id',$user->id)->first();
        $coverture = $request->cover;
        $new_coverture = time(). $coverture->getClientOriginalName();
        $coverture->move('uploads/covertures',$new_coverture);
        $profile->coverture = '/uploads/covertures/'.$new_coverture ; 
        $profile->save();
        return redirect()->back();
        

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
