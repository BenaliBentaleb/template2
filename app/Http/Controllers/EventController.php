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

    public function show(){
        foreach(Auth::user()->roles as $role){
            if($role->nom == "Administrateur" || $role->nom == "Enseignant" || $role->nom == "Gérant club" ){
                return view('evenement-ajouter');
            }            
            break; 
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

     public function update($id,Request $request) {
        $event  =  Event::find($id);
        $event->user_id = Auth::id();
        $event->titre = $request->titre;
        $event->contenu = $request->contenu;
        $event->debut = $request->debut;
        $event->fin = $request->fin;
        $event->save();
        return redirect()->back();
     }

     public function destroy($id) {
        $event  =  Event::find($id);
        $event->delete();
        return redirect()->back();
     }

}
