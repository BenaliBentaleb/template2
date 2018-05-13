<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use App\PortailMemoire;
use Auth;
class PortailMemoireController extends Controller
{

    public function index()
    {
        // $departement = Departement::all();
        return view('portailMemoire'); //->with('departement',$departement);
    }

    public function show()
    {
        return view('addMemoire');
    }

    public function getformation(Request $request)
    {
        $formation = Formation::where('type', $request->type)->get();
        return $formation;
    }

    public function store(Request $request)
    {
        return $request->fichier->getClientOriginalName();
    }

    public function saveFile(Request $request)
    {

        $validator = Validator::make($request->all(), PortailMemoire::rules(),PortailMemoire::messages());


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
        $filename = time() . "." . $ext;
        //path of your local folder
        $path = public_path() . "/files/" . $filename;
        //upload image to your path
        if (file_put_contents($path, $decode)) {
               $memoire->fichier = "files/".$filename;

               $memoire->save();
               return $memoire;
        }
    }

}
