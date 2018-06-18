<?php

namespace App\Http\Controllers;

use App\Formation;
use App\PortailMemoire;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Http\Requests\MemoireRequest;
use App\Http\Requests\ModifierMemoireRequest;
class PortailMemoireController extends Controller
{



   /* public function __construct()
    {
        $this->middleware('auth')->except('portailmemoire');
    }*/

    public function index()
    {
        
        $memoire = PortailMemoire::all();

        return view('portailMemoire')->with('memoire',$memoire); 
    }

    public function portail_memoire_unregestred() {
        $memoire = PortailMemoire::all();

        return view('portialMemoirNoAuth')->with('memoire',$memoire); 
    }

    public function download($id,$number) {
        
        $fichier = PortailMemoire::find($id);
        $fichier->counter = $number;
        $fichier->save();
       
       // dd($fichier);
        $headers = ['Content-Type: application/*'];

        return  response()->download($fichier->fichier, $fichier->titre, $headers);
        
        

        
    }

    public function count($id) {
        $fichier = PortailMemoire::find($id); 
        return $fichier->counter;
    }

    public function show()
    {
        return view('addMemoire')->with('formations_licence',Formation::where('type','licence')->get())
        ->with('formations_master',Formation::where([
            ['type', '=', 'master'],
            ['nom', 'like', '%2%']])->get());
    }

    public function getformation(Request $request)
    {
        if($request->type == "master"){
            $formation = Formation::where([['type', '=', 'master'],
                                         ['nom', 'like', '%2%']])->get();
            return $formation;
        }
        $formation = Formation::where('type', $request->type)->get();
        return $formation;
    }

    public function store(Request $request)
    {
        return $request->fichier->getClientOriginalName();
    }

    public function saveFile(MemoireRequest $request)
    {
       // dd($request);
        $memoire = new PortailMemoire;
        $memoire->user_id = Auth::id();
        $memoire->formation_id = $request->formation_id;
        $memoire->titre = $request->titre;
        $memoire->type = $request->type;
        $memoire->date = $request->date;
        
        $memoire->encadreur = $request->encadreur;
        $memoire->etudiant1 = $request->etudiant1;
        $memoire->etudiant2 = $request->etudiant2;
        $memoire->etudiant3 = $request->etudiant3;
        $memoire->etudiant4 = $request->etudiant4;
        
       
           
        $file =$request->fichier;
        //dd($file);
        $memoireFileNewName= time() . $file->getClientOriginalName();
        $file->move('files',$memoireFileNewName);
        $memoire->fichier='files/' . $memoireFileNewName; 
      
        $memoire->save();
        return redirect()->back();

    }

    public function modifie($id){
        return view('PortailMemoire-modifie')->with('formations_licence',Formation::where('type','licence')->get())
                                            ->with('formations_master',Formation::where([
                                                ['type', '=', 'master'],
                                                ['nom', 'like', '%2%']])->get())
                                            ->with('memoire',PortailMemoire::find($id));
    }

    public function edit(ModifierMemoireRequest $request,$id){

        $memoire = PortailMemoire::find($id);
        $memoire->user_id = Auth::id();
        $memoire->formation_id = $request->formation_id;
        $memoire->titre = $request->titre;
        $memoire->type = $request->type;
        $memoire->date = $request->date;
        
        $memoire->encadreur = $request->encadreur;
        $memoire->etudiant1 = $request->etudiant1;
        $memoire->etudiant2 = $request->etudiant2;
        $memoire->etudiant3 = $request->etudiant3;
        $memoire->etudiant4 = $request->etudiant4;

        if($request->hasFile('fichier')){
            $file =$request->fichier;
            $memoireFileNewName= time() . $file->getClientOriginalName();
            $file->move('files',$memoireFileNewName);
            $memoire->fichier='files/' . $memoireFileNewName;
        }
        $memoire->save();
        return redirect()->route('portail.memoire');
    }

    public function delete ($id){
        $memoire = PortailMemoire::find($id);
        $memoire->delete();
        
        return redirect()->back();
    }
}
