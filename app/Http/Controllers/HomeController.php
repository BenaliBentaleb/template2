<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
use App\Semestre;
use App\Formation;
use App\Publication;
use App\Commentaire;
use App\Like;
use App\Sondage;
use App\Faq;
use App\PublicationFichier;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departement = Departement::all();
        $publications = Publication::orderBy('created_at', 'desc')->get();
      
      

        
        $semestre = Semestre::all();
        return view('home')->with('departement',$departement)
                           ->with('publications',$publications);
                          
      
    }

    public function modules($nom) {
        
           $departement = Departement::all();
           $formation = Formation::where('nom','=',$nom)->first();
           $this->collection = collect([]);
       foreach($formation->modules as $m )
        {
            $s=  Semestre::find($m->semestre->id);
            if(!$this->collection->contains($s->nom)) {
                $this->collection->put($s->nom,$s->modules);
            }
        }


       
        return view('formation')->with('modules',$this->collection)
                                ->with('departement',$departement)
                                ->with('publications',$formation->modules);
    }


    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return redirect()->back();
    }

    public function download($id) {
        $fichier = PublicationFichier::find($id);
        $headers = ['Content-Type: application/*'];

        return response()->download($fichier->chemin_fichier, $fichier->nom_fichier, $headers);

    }
   
}
