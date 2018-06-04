<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Publication;
use App\PortailMemoire;
use App\Reclamation;
use App\Event;
use App\Departement;
use App\Formation;
use App\Module;
use App\Semestre;
use Illuminate\Support\Facades\Validator;
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
        ->with('sondage',10)
        ->with('memoire',PortailMemoire::all()->count())
        ->with('reclamation',Reclamation::all()->count())
        ->with('evenement',Event::all()->count())
        ->with('departement',Departement::all()->count())
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

    public function storeDepartement(Request $request) {
        
       $departement = new Departement;
       $departement->nom = $request->nom;
       $departement->save();

       return redirect()->route('admin.departement');
    } 

    public function editDepartement(Request $request, $id) {
        
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
    
    public function storeFormation(Request $request) {
            
        $formation = new Formation;
        $formation->nom = $request->nom;
        $formation->departement_id = $request->departement;
        $formation->type = $request->type;
        $formation->save();
    
        return redirect()->route('admin.formation');
    } 
    
    public function editFormation(Request $request, $id) {
            
        $formation = Formation::find($id);
        $formation->nom = $request->nom;
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
                                            ->with('formations',Formation::all())
                                            ->with('semestres', Semestre::all());
    }
        
    public function storeModule(Request $request) {
                
        $module = new Module;
        $module->nom = $request->nom;
        $module->formation_id = $request->formation_id;
        $module->semestre_id = $request->semestre_id;
        $module->save();
        
        return redirect()->route('admin.module');
    } 
        
    public function editModule(Request $request, $id) {
                
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

    
    /* public function saveFile(Request $request)
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

    } */

        
    public function storeMemoire(Request $request) {
                
        $validator = Validator::make($request->all(), PortailMemoire::rules(), PortailMemoire::messages());
       
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
        
        /* $file =$request->fichier;
        $memoireFileNewName= time() . $file->getClientOriginalName();
        $file->move('files',$memoireFileNewName);
        $memoire->fichier='files/' . $memoireFileNewName; */
        //dd($request->fichier);
        
       
           
            $file =Input::file('fichier');
            //dd($file);
            $memoireFileNewName= time() . $file->getClientOriginalName();
            $file->move('files',$memoireFileNewName);
            $memoire->fichier='files/' . $memoireFileNewName; 
                        

                         /* $fichier = $request->fichier;
                        // remove extra parts
                        $exploded = explode(",", $fichier);
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
                        }  */
    


      
        $memoire->save();
        return redirect()->route('admin.memoire');
}
        
    public function editMemoire(Request $request, $id) {
                
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
            /*
            $fichier = $request->fichier;
            // remove extra parts
            $exploded = explode(",", $fichier);
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
            }*/
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
    
}