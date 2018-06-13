<?php

namespace App\Http\Controllers;

use App\Reclamation;
use Illuminate\Http\Request;
use App\Departement;
use Auth ; 
use App\User;
use App\Notifications\ReclamationNotification ;

class ReclamationController extends Controller
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
        foreach(Auth::user()->roles as $role){
            if($role->nom == "Administrateur" || $role->nom == "Enseignant"  ){
                return redirect()->route('home');
            }            
            break; 
        }
        $departement = Departement::all();
        return view('reclamation') ->with('departement',$departement);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $reclamation = new Reclamation;
         $reclamation->user_id = Auth::id();
         $reclamation->title = $request->title;
         $reclamation->Type = $request->Type;
         $reclamation->reclamation = $request->reclamation;

         $reclamation->save();

         foreach(User::all() as $user ) {
            if($user->isAdmin()) {
                $user->notify(new  ReclamationNotification(Reclamation::find($reclamation->id)));
 
            }
         }
         return $reclamation;
       


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamation $reclamation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamation $reclamation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamation $reclamation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamation $reclamation)
    {
        //
    }
}
