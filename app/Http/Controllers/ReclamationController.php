<?php

namespace App\Http\Controllers;

use App\Reclamation;
use Illuminate\Http\Request;
use App\Departement;
use Auth ; 
use App\User;
use App\ReclamationChat;
use App\Notifications\ReclamationNotification ;
use App\Http\Requests\ReclamationRequest;

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
        $reclamations = Reclamation::where('user_id','=',Auth::id())->get();
        return view('reclamation') ->with('departement',$departement)
                                    ->with('reclamations',$reclamations);
        
        
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
    public function store(ReclamationRequest $request)
    {
         $reclamation = new Reclamation;
         $reclamation->user_id = Auth::id();
         $reclamation->title = $request->title;
         $reclamation->Type = $request->type;
         $reclamation->reclamation = $request->reclamation;
         

         
         //dd($file);
         if($request->hasfile('fichier')) {
            $file =$request->fichier;
            $reclamationFile= time() . $file->getClientOriginalName();
            $file->move('files',$reclamationFile);
            $reclamation->fichier='files/' . $reclamationFile; 
         }
         $reclamation->save();
        

         

         foreach(User::all() as $user ) {
            if($user->isAdmin()) {
                $user->notify(new  ReclamationNotification(Reclamation::find($reclamation->id)));
 
            }
         }
         return redirect('/home');
       


    }

    public function download($id)
    {
        $fichier = Reclamation::find($id);
       // dd($fichier);
      
        $headers = ['Content-Type: application/*'];

        return response()->download($fichier->fichier, $fichier->titre, $headers);

    }


    public function sendMessageReclamation(Request $request, $id) {
                
        //dd($request);
        //$r = Reclamation::find($id);
        $rChat  = new ReclamationChat;
        $rChat->reclamation_id = $id;
        $rChat->sender_id = Auth::id();
        $rChat->chat = $request->msg;
        $rChat->save();
        return redirect()->back();
    }

    public function repondreReclamation($id) {
        $chat = ReclamationChat::where('reclamation_id','=',$id)->get();
        //dd($chat);
        return view('reclamationRepondre')->with('reclamation',Reclamation::find($id))
                                            ->with('reclamation_chat',$chat);
                                            
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
