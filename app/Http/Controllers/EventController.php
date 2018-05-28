<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
class EventController extends Controller
{
    public function store(Request $request) {
        $event  = new Event;
        $event->user_id = Auth::id();
        $event->titre = $request->titre;
        $event->contenu = $request->contenu;
        $event->debut = $request->debut;
        $event->fin = $request->fin;
        $event->save();
        return redirect()->back();
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
