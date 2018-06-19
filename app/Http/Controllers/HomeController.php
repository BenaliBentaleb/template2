<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Formation;
use App\Publication;
use App\PublicationFichier;
use App\Semestre;
use App\Event;
use App\User;
use Auth;
use Illuminate\Http\Request;

//use Illuminate\Notifications\DatabaseNotification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('auth');//except('WithoutAuth')->except('formationWithoutAuth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departement = Departement::all();
        $publications = Publication::where('signaler', 0)->orderBy('created_at', 'desc')->simplePaginate(15);
        $events = Event::whereNull('formation_id')->get();
        //dd($events->all());
        //dd($events);
        // $semestre = Semestre::all();
        return view('home')->with('departement', $departement)
            ->with('events', $events)
            ->with('publications', $publications);

    }

    public function WithoutAuth()
    {
        $publications = Publication::where('signaler', 0)->where('type','<>', 'Sondage')->orderBy('created_at', 'desc')->simplePaginate(15);
        $events = Event::whereNull('formation_id')->get();
        // $semestre = Semestre::all();
        return view('homeAnauth')->with('publications', $publications)->with('events', $events);

    }

    public function modules($nom)
    {

        $departement = Departement::all();
        $formation = Formation::where('nom', '=', $nom)->first(); 
        $events = Event::where('formation_id' , '=', $formation->id)->get();
        //dd($events->all());
        $this->collection = collect([]);
        foreach ($formation->modules as $m) {
            $s = Semestre::find($m->semestre->id);
            if (!$this->collection->contains($s->nom)) {
                $this->collection->put($s->nom, $s->modules);
            }
        }

        return view('formation')->with('modules', $this->collection)
            ->with('departement', $departement)
            ->with('publications', $formation->modules)
            ->with('formation_nom',$nom)
            ->with('events',$events);
    }

    public function without_auth_modules($nom)
    {

        $departement = Departement::all();
        $events = Event::whereNull('formation_id')->get();
        $formation = Formation::where('nom', '=', $nom)->first();
        $this->collection = collect([]);
        $events = Event::where('formation_id' , '=', $formation->id)->get();
        foreach ($formation->modules as $m) {
            $s = Semestre::find($m->semestre->id);
            if (!$this->collection->contains($s->nom)) {
                $this->collection->put($s->nom, $s->modules);
            }
        }

        return view('formationAnauth')->with('modules', $this->collection)
            ->with('formation_nom',$formation)
            ->with('departement', $departement)
            ->with('publications', $formation->modules)->with('events',$events);;

    }

    public function destroy($id)
    {
        $publication = Publication::find($id);
        $publication->delete();
        return redirect('/home');
    }

    public function download($id)
    {
        $fichier = PublicationFichier::find($id);
       // dd($fichier);
      
        $headers = ['Content-Type: application/*'];

        return response()->download($fichier->chemin_fichier, $fichier->nom_fichier, $headers);

    }
    public function NumberOfdownload($id) {
        $fichier = PublicationFichier::find($id);
        return $fichier->counter;
    }

    public function modify_password($id,Request $request) {
        
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        //Auth::loginUsingId($user->id);
        return redirect()->to('/home');
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

    public function read(Request $request)
    {
        return Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
    }
    public function admin_read(Request $request)
    {
        return Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
    }

    public function remove($id)
    {
        $fichier = PublicationFichier::find($id);
        $fichier->delete();
        return redirect()->back();
    }

}
