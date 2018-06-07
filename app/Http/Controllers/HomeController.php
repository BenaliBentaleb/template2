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
use Auth;
//use Illuminate\Notifications\DatabaseNotification;
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
        $publications = Publication::where('signaler',0)->orderBy('created_at', 'desc')->simplePaginate(2);
      
      

        
       // $semestre = Semestre::all();
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
        return redirect('/home');
    }

    public function download($id) {
        $fichier = PublicationFichier::find($id);
        $headers = ['Content-Type: application/*'];

        return response()->download($fichier->chemin_fichier, $fichier->nom_fichier, $headers);

    }

   /* public function notifications()
    {
        $noty = [];
         Auth::user()->unreadNotifications->markAsRead();
        // Auth::user()->notifications[0]->data['nom'];
         foreach(Auth::user()->notifications as $not) {
            array_push($noty,$not->data);
         }

         return view('user.notification')->with('nots',$noty);
    }*/

    
    public function read(Request $request) {  
      return  Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
    }
    public function admin_read(Request $request) {  
        return  Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
      }

      public function remove($id) {
        $fichier = PublicationFichier::find($id);
        $fichier->delete();
        return redirect()->back();
      }
   
}
