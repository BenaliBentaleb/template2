<?php

namespace App\Http\Controllers;

use App\Formation;
use App\PortailMemoire;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class PortailMemoireController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $memoire = PortailMemoire::all();

        return view('portailMemoire')->with('memoire',$memoire); 
    }

    public function download($id) {
        
        $fichier = PortailMemoire::find($id);
       
        $fichier->counter++;
        
        
        $fichier->save();
       // dd($fichier);
        $headers = ['Content-Type: application/*'];

        return response()->download($fichier->fichier, $fichier->titre, $headers);
    }

    public function show()
    {
        return view('addMemoire');
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

    public function saveFile(Request $request)
    {
        

        $validator = Validator::make($request->all(), PortailMemoire::rules(), PortailMemoire::messages());
       
        if ($validator->passes()) {
            $memoire = new PortailMemoire;
            $memoire->user_id = Auth::id();
            $memoire->formation_id = $request->formation;
            $memoire->titre = $request->titre;
            $memoire->type = $request->niveau;
            $memoire->date = $request->annee;
            $memoire->encadreur = $request->encadreur;
            $memoire->etudiant1 = $request->etudiant1;
            $memoire->etudiant2 = $request->etudiant2;
            $memoire->etudiant3 = $request->etudiant3;
            $memoire->etudiant4 = $request->etudiant4;

            $file = $request->fichier;

            // remove extra parts
            $exploded = explode(",", $file);
            // extention
            if (str_contains($exploded[0], 'pdf')) {
                $ext = 'pdf';
            }
            // decode
            $decode = base64_decode($exploded[1]);
            $filename = time() . str_random(7). "." . $ext;
            //path of your local folder
            $path = public_path() . "/files/" . $filename;
            //upload image to your path
            if (file_put_contents($path, $decode)) {
                $memoire->fichier = "files/" . $filename;
               // dd($memoire->fichier) ;
                $memoire->save();
                //return $memoire;
                return Response::json(['success' => '1']);
            }

           
        }
        return Response::json(['errors'=> $validator->errors()]);

    }

}
