<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EventRequest;
use App\Http\Requests\DepartementRequest;
use App\Http\Requests\FormationRequest;
use App\Http\Requests\MemoireRequest;
use App\Http\Requests\ModifierMemoireRequest;
use App\Http\Requests\ModifierDepartementRequest;
use App\Http\Requests\ModuleRequest;

use Auth;
use App\User;
use App\Publication;
use App\PortailMemoire;
use App\Reclamation;
use App\ReclamationChat;
use App\Event;
use App\Departement;
use App\Formation;
use App\Sondage;
use App\Role;
use App\Profile;
use App\Module;
use App\Semestre;
use Carbon;

use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index() {

        return view('admin.admin')
        ->with('users',User::all()->count())
        ->with('status',Publication::where('type','Status')->count())
        ->with('Tutorial',Publication::where('type','Tutorial')->count())
        ->with('FAQ',Publication::where('type','FAQ')->count())
        ->with('sondage',Sondage::all()->count())
        ->with('memoire',PortailMemoire::all()->count())
        ->with('reclamation',Reclamation::all()->count())
        ->with('evenement',Event::all()->count())
        ->with('departement',Departement::all()->count())
        ->with('formation',Formation::all()->count())
        ->with('chat',Auth::id())
        ->with('profile',Auth::id())
        ->with('module',Module::all()->count())
        ->with('formation',Formation::all()->count());
    }

    public function utilisateur() {
        return view('admin.utilisateur')->with('users',User::paginate(6));
    }

    public function deleteUser($id) {
        
        $user = User::find($id);
        $user->delete();
      //  return $user;
       return redirect()->back();
    } 

    public function publications() {

        $publications = Publication::where('signaler',0)->paginate(12);
        $publications_signaler = Publication::where('signaler',1)->get();


        return view('admin.publications')
        ->with('publications',$publications)
        ->with('pubs_signaler',$publications_signaler);
    }


    public function ajouter_utilisateur_form() {

        return view('admin.ajouterUtilisateur');
    }


    public function search(Request $request) {
      //  dd($request);
        $q =  $request->search;
        $user = User::where('nom','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')
        ->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($user) > 0) {
            return view('admin.searchUtilisateur')->withDetails($user)->withQuery ( $q );
        } 

       return view ('admin.searchUtilisateur')->withMessage('accune  information !');
        
    }



    public function ajouter_utilisateur(StoreUser $request) {

        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

            
             Profile::create([
                'user_id' =>  $user->id,
                'photo_profile'=> '/uploads/avatars/1526153957mal.png',
                'coverture' => null,
                'information' => null,
                'formation_id'=>null,
                'email' =>$user->email,
                'telephone'=>null,
                'date_naissance'=>null,
                'addresse' => null,
                'facebook' => null,
                'twitter' => null,
                'instagram' => null,
                'youtube' => null,
                
           ]);
        
           // roles array binded with input form
        $roles = ['Administrateur','Enseignant','Etudiant','Gérant-club'];
        if($request->Etudiant == null &&  !$request->Enseignant ) {
            $role = new Role;
            $role->user_id = $user->id;
            $role->nom = 'Etudiant';
            $role->save();
         }

        foreach($roles as $r ) {
            if($request->$r) {
                $role = new Role;
                $role->user_id = $user->id;
                $role->nom = $request->$r;
                $role->save();

            }
        }
       
        return redirect()->route('admin.utilisateur');

    }

    public function modifier_utilisateur_form($id) {

       return view('admin.modifierRoleUser')->with('user',User::find($id));

    }

    public function modifier_utilisateur($id,Request $request) {
        $user = User::find($id);
        $user->roles()->delete();

             // roles array binded with input form
             $roles = ['Administrateur','Enseignant','Etudiant','Gérant-club'];

             if($request->Etudiant == null &&  !$request->Enseignant ) {
                $role = new Role;
                $role->user_id = $user->id;
                $role->nom = 'Etudiant';
                $role->save();
             }

             foreach($roles as $r ) {
                
                 if($request->$r) {
                     $role = new Role;
                     $role->user_id = $user->id;
                     $role->nom = $request->$r;
                     $role->save();
     
                 }
             }


        return redirect()->route('admin.utilisateur');

    }

    


    /*START SECTION DEPARTEMENT */

    public function departement() {
        return view('admin.departement')->with('departements',Departement::paginate(7));
    }

    public function ajoutDepartement() {
        return view('admin.departement-ajout');
    }

    public function modifieDepartement($id) {
        return view('admin.departement-modifie')->with('departement',Departement::find($id));
    }

    public function storeDepartement(DepartementRequest $request) {

      
       $departement = new Departement;
       $departement->nom = $request->nom;
       $departement->save();

       return redirect()->route('admin.departement');
    } 

    public function editDepartement(ModifierDepartementRequest $request, $id) {
        
        $departement = Departement::find($id);
        $departement->nom = $request->nom;
        $departement->save();
 
        return redirect()->route('admin.departement');
     } 

     public function deleteDepartement($id) {
        
        $departement = Departement::find($id);
        $departement->delete();
       return redirect()->back();
    } 
    /*END SECTION DEPARTEMENT */

    /*START SECTION FORMATION */

    public function formation() {
        return view('admin.formation')->with('formations',Formation::paginate(7));
    }
    
    public function ajoutFormation() {
        return view('admin.formation-ajout')->with('departements',Departement::all());
    }
    
    public function modifieFormation($id) {
        return view('admin.formation-modifie')->with('formation',Formation::find($id))
                                                    ->with('departements',Departement::all());
    }
    
    public function storeFormation(FormationRequest $request) {
            
        $formation = new Formation;
        $formation->nom = ucfirst($request->nom);
        $formation->departement_id = $request->departement;
        $formation->type = $request->type;
        $formation->save();
    
        return redirect()->route('admin.formation');
    } 
    
    public function editFormation(FormationRequest $request, $id) {
            
        $formation = Formation::find($id);
        $formation->nom = ucfirst($request->nom);
        $formation->departement_id = $request->departement;
        $formation->type = $request->type;
        $formation->save();
     
        return redirect()->route('admin.formation');
    } 
    
    public function deleteFormation($id) {
            
        $formation = Formation::find($id);
        $formation->delete();
        return redirect()->back();
    } 
    /*END SECTION FORMATION */

    /*START SECTION MODULES */

    public function module() {
        return view('admin.module')->with('modules',Module::paginate(7));
    }
        
    public function ajoutModule() {
        return view('admin.module-ajout')->with('departements',Departement::all())
                                         ->with('semestres', Semestre::all());
    }
        
    public function modifieModule($id) {
        return view('admin.module-modifie')->with('module',Module::find($id))
                                            ->with('departements',Departement::all())
                                            ->with('semestres', Semestre::all());
    }
        
    public function storeModule(ModuleRequest $request) {
                
        $module = new Module;
        $module->nom = $request->nom;
        $module->formation_id = $request->formation_id;
        $module->semestre_id = $request->semestre_id;
        $module->save();
        
        return redirect()->route('admin.module');
    } 
        
    public function editModule(ModuleRequest $request, $id) {
                
        $module = Module::find($id);
        $module->nom = $request->nom;
        $module->formation_id = $request->formation_id;
        $module->semestre_id = $request->semestre_id;
        $module->save();
         
        return redirect()->route('admin.module');
    } 
        
    public function deleteModule($id) {
                
        $module = Module::find($id);
        $module->delete();
        return redirect()->back();
    } 
    /*END SECTION MODULES */

    /*START SECTION MEMOIRE */

    public function memoire() {
        return view('admin.memoire')->with('memoires',PortailMemoire::paginate(9));
    }
        
    public function ajoutMemoire() {
        return view('admin.memoire-ajout')->with('formations_licence',Formation::where('type','licence')->get())
                                            ->with('formations_master',Formation::where([
                                                ['type', '=', 'master'],
                                                ['nom', 'like', '%2%']])->get());
                                         
    }
        
    public function modifieMemoire($id) {
        return view('admin.memoire-modifie')->with('memoire',PortailMemoire::find($id))
                                            ->with('formations_licence',Formation::where('type','licence')->get())
                                            ->with('formations_master',Formation::where([
                                                ['type', '=', 'master'],
                                                ['nom', 'like', '%2%']])->get());
                                            
    }

        
    public function storeMemoire(MemoireRequest $request) {
                
      //  $validator = Validator::make($request->all(), PortailMemoire::rules(), PortailMemoire::messages());
       
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
        
       
           
        $file =Input::file('fichier');
        //dd($file);
        $memoireFileNewName= time() . $file->getClientOriginalName();
        $file->move('files',$memoireFileNewName);
        $memoire->fichier='files/' . $memoireFileNewName; 
      
        $memoire->save();
        return redirect()->route('admin.memoire');
}
        
    public function editMemoire(ModifierMemoireRequest $request, $id) {
                
        $memoire = PortailMemoire::find($id);
        $memoire->formation_id = $request->formation_id;
        $memoire->titre = $request->titre;
        $memoire->type = $request->type;
        $memoire->date = $request->date;
        
        $memoire->encadreur = $request->encadreur;
        $memoire->etudiant1 = $request->etudiant1;
        $memoire->etudiant2 = $request->etudiant2;
        $memoire->etudiant3 = $request->etudiant3;
        $memoire->etudiant4 = $request->etudiant4;
        
        if ($request->hasFile('fichier')){
            $file =Input::file('fichier');
            $memoireFileNewName= time() . $file->getClientOriginalName();
            $file->move('files',$memoireFileNewName);
            $memoire->fichier='files/' . $memoireFileNewName; 
        }
  
        $memoire->save();
         
        return redirect()->route('admin.memoire');
    } 
        
    public function deleteMemoire($id) {
                
        $memoire = PortailMemoire::find($id);
        $memoire->delete();
        return redirect()->back();
    } 
    /*END SECTION MEMOIRE */

    /*START SECTION RECLAMATION */
    public function reclamation() {
        return view('admin.reclamation')->with('reclamations',Reclamation::paginate(9));
    }

    public function deleteReclamation($id) {
                
        $reclamation = Reclamation::find($id);
        $reclamation->delete();
        return redirect()->back();
    } 

    public function repondreReclamation($id) {
        return view('admin.reclamation-repondre')->with('reclamation',Reclamation::find($id))
                                                ->with('chat',ReclamationChat::where('reclamation_id',$id)->get());
    } 

    public function terminerReclamation($id) {
                
        // status 0 = en attent 
        // status 1 = terminé
        // status 2 = rejecté
        $reclamation = Reclamation::find($id);
        $reclamation->status = 1;
        $reclamation->save();
        return redirect()->back();
    } 
    public function rejeterReclamation($id) {
                
        $reclamation = Reclamation::find($id);
        $reclamation->status = 2;
        $reclamation->save();
        return redirect()->back();
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
    /*END SECTION RECLAMATION */
    
        /*START SECTION EVENTS */

        public function event() {
            return view('admin.event')->with('events',Event::orderBy('is_archived','ASC')->paginate(9));
    }
            
    public function ajoutEvent() {
        return view('admin.event-ajout')->with('departements',Departement::all());
    }
            
    public function modifieEvent($id) {
        return view('admin.event-modifie')->with('event',Event::find($id))                                   
                                          ->with('departements',Departement::all());                                    
    }
            
    public function storeEvent(EventRequest $request) {
                    
        

        
            $event = new Event;
            $event->titre = $request->titre;
            $event->user_id = Auth::id();
            $event->event_role = $request->event_role;
            $event->formation_id = $request->formation_id;
            $event->description = $request->description;
            $event->contenu = $request->contenu;
            $event->debut = $request->debut;
            $event->fin = $request->fin;
            $event->save();
           
       
        return redirect()->route('admin.event');
        
            
        
    } 
            
    public function editEvent(EventRequest $request, $id) {
                    
        $event = Event::find($id);
        $event->titre = $request->titre;
        $event->event_role = $request->event_role;
        $event->formation_id = $request->formation_id;
        $event->description = $request->description;
        $event->contenu = $request->contenu;
        $event->debut = $request->debut;
        $event->fin = $request->fin;
        $event->save();
             
        return redirect()->route('admin.event');
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

    public function deleteEvent($id) {
        $event = Event::find($id);
        $event->delete();
        return redirect()->back();
    } 
    /*END SECTION EVENTS */
}