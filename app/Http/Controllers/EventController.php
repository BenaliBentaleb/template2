<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Departement;
use Auth;
use App\Formation;
use App\Http\Requests\EventRequest;
class EventController extends Controller
{
    public function index(){
        $nticien_events = Event::whereNull('formation_id')->get();
        $formation = Formation::all();

        $this->collection = collect([]);

        foreach($formation  as  $f) {
            $this->collection->put($f->nom, $f->events);
        }

        //dd ($this->collection);
        //$events = array();
        $events_all = Event::whereNotNull('formation_id')->get();

          return view('evenement')->with('nticien_events',$nticien_events)
                                    ->with('events',$this->collection);
      
       /* return view('evenement')->with('nticien_events',$nticien_events)
                                    ->with('events',$events_all);*/
    }

    public function evenmentNoauth() {
        $nticien_events = Event::whereNull('formation_id')->get();
        //$events = array();
        $events_all = Event::whereNotNull('formation_id')->get();
      
        return view('evenementNoAuth')->with('nticien_events',$nticien_events)
                                    ->with('events',$events_all);
    }

    public function show($formation){
        //dd($formation);

        if(Auth::user()->isAdmin()) {
            //if($role->nom == "Administrateur" || $role->nom == "Enseignant" || $role->nom == "Gérant club" ){
                if($formation == "NTICIEN"){
                    //$formation_clicked = Formation::where('nom','=',$formation)->first();
                    //dd($formation_clicked->id);
                    return view('evenement-ajouter')->with('formation_clicked','NTICIEN');
                }else{
                    $formation_clicked = Formation::where('nom','=',$formation)->first();
                    //dd($formation_clicked->id);
                    return view('evenement-ajouter')->with('formation_clicked',$formation_clicked);
                }
                
           // }   
        }
        foreach(Auth::user()->roles as $role){
            if( $role->nom == "Enseignant" || $role->nom == "Gérant club" ){
                if($formation == "NTICIEN"){
                    //$formation_clicked = Formation::where('nom','=',$formation)->first();
                    //dd($formation_clicked->id);
                    return view('evenement-ajouter')->with('formation_clicked','NTICIEN');
                }else{
                    $formation_clicked = Formation::where('nom','=',$formation)->first();
                    //dd($formation_clicked->id);
                    return view('evenement-ajouter')->with('formation_clicked',$formation_clicked);
                }
                
            }            
            continue; 
        }
       
        return redirect()->route('home');
    
        
    }

    public function store(EventRequest $request) {
        $event  = new Event;
        $event->user_id = Auth::id();
        $event->event_role = $request->event_role;
        $event->formation_id = $request->formation_id;
        $event->titre = $request->titre;
        $event->description = $request->description;
        $event->contenu = $request->contenu;
        $event->debut = $request->debut;
        $event->fin = $request->fin;
        $event->save();
        return redirect()->route('evenement');
     }

     public function modifieEvent($id) {
        return view('evenement-modifie')->with('event',Event::find($id))                                   
                                          ->with('departements',Departement::all());                                    
    }

     public function update($id,Request $request) {
        $event  =  Event::find($id);
        $event->user_id = Auth::id();
        $event->titre = $request->titre;
        $event->contenu = $request->contenu;
        $event->description = $request->description;
        $event->event_role = $request->event_role;
        $event->formation_id = $request->formation_id;
        $event->debut = $request->debut;
        $event->fin = $request->fin;
        $event->save();
        return redirect()->route('evenement');
     }

     public function destroy($id) {
        $event  =  Event::find($id);
        $event->delete();
        return redirect()->back();
     }

     public function archiverEvent($id) {      
        $event = Event::find($id);
        $event->is_archived = 1;
        $event->save();
        return redirect()->back();
    } 

    public function unarchiveEvent($id) {      
        $event = Event::find($id);
        $event->is_archived = 0;
        $event->save();
        return redirect()->back();
    } 

}
