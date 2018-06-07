<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Validator;

use Auth;
use App\User;
use App\Publication;
use App\PortailMemoire;
use App\Reclamation;
use App\Event;
use App\Departement;
use App\Formation;
use App\Sondage;
use App\Role;
use App\Profile;
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
        ->with('profile',Auth::id());
    }

    public function utilisateur() {
        

        return view('admin.utilisateur')->with('users',User::paginate(6));
    }

    public function delete($id) {
        
        $user = User::find($id);
        $user->delete();
      //  return $user;
       return redirect()->back();
    } 

    public function publications() {

        $publications = Publication::where('signaler',0)->paginate(3);
        $publications_signaler = Publication::where('signaler',1)->get();


        return view('admin.publications')
        ->with('publications',$publications)
        ->with('pubs_signaler',$publications_signaler);
    }


    public function ajouter_utilisateur_form() {

        return view('admin.ajouterUtilisateur');
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
        $roles = ['administrateur','enseignant','etudiant','gclub'];

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
             $roles = ['administrateur','enseignant','etudiant','gclub'];

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

    


}
