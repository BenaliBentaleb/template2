<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use App\User ; 
use App\Publication;
use App\Departement;
use App\Profile;

use App\Formation;
class ProfileController extends Controller
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

    public function profile( Request $request,$id) {

        $user = User::find($id);
        $user_publication;
        $departements = Departement::all();
        $formation = Formation::where('id',$user->profile->formation_id)->first();
    
       if($request->type && $request->type != "Tous" ) {
            $user_publication = Publication::where('user_id',$id)->where('type',$request->type)->get();
        } else {
            $user_publication=  $user->publications;
        }
        
        $this->collection = collect([]);
            
        foreach($departements as  $departement) {
            $this->collection->put($departement->nom,$departement->formation);

        }

        return view('user.profile')->with('user',$user)->with('departement',$departements)
       ->with('publications',$user_publication)
       ->with('profile',$user->id)
       ->with('formation_user',$formation)
       ->with('type',$request->type)
       ->with('depfromation',$this->collection);
    }

   /* public function get_publication_user(Request $request,$id) {
       
        $user = User::find($id);
        $departements = Departement::all();
        

        if($request) {
            $user_publication = Publication::where('user_id',$id)->where('type',$request->type)->get();
        } else {
            $user_publication=  $user->publications;
        }
      
        
        $formation = Formation::where('id',$user->profile->formation_id)->first();
     
        $this->collection = collect([]);
            //dd($departements->formation);
        foreach($departements as  $departement) {

                if(!$this->collection->contains($departement->nom)) {

                   $this->collection->put($departement->nom,$departement->formation);
                
                }
        }

        return view('user.profile')->with('user',$user)->with('departement',$departements)
        ->with('publications',$user_publication)
        ->with('formation_user',$formation->nom)
        ->with('profile',$user->id)
        ->with('depfromation',$this->collection);
    }*/

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
      

        
        

        $validator = Validator::make($request->all(), Profile::rules(),Profile::messages());

        if ($validator->passes()) {

            $splitName = explode(' ', $request->nom_prenom, 2); 

            $user = Profile::find($id);
            $user->user->nom =  $splitName[0];
            $user->user->prenom = !empty($splitName[1]) ? $splitName[1] : '';
            $user->user->email = $request->email;
            if($request->has('password')) {
                $user->user->password =  bcrypt($request->password);
            }
            $user->formation_id = $request->formation;
           
            $user->telephone = $request->numero_telephone;
            $user->date_naissance = $request->date_naissance;
            $user->addresse = $request->addresse;
            $user->information = $request->informations;
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->instagram = $request->instagram;
            $user->youtube = $request->youtube;
     
            $user->save();
            $user->user->save();

            return Response::json(['success' => '1']);

        }
        
        return Response::json(['errors' => $validator->errors()]);

         
     
         //   return redirect()->back();
        

     
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
