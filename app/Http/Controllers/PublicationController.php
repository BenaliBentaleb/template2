<?php

namespace App\Http\Controllers;

use App\Publication;
use App\PublicationFichier;
use Auth;
use App\User;
use Illuminate\Http\Request;
//use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogRequest;

use App\Notifications\SignalerNotification;
use App\Http\Requests\ModifierPublicationRequest;

class PublicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $publication = new Publication;
        $publication->titre = $request->titre;
        $publication->slug = str_slug($request->titre);
        $publication->user_id = Auth::id();

        if ($request->type) {
            $publication->type = $request->type; //blog
            $publication->contenu = $request->blog;

            if ($request->blog_module == 'general') {
                $publication->module_id = null;
            } else {
                $publication->module_id = $request->blog_module;
            }

        } else {
            $publication->type = 'Status';
            $publication->contenu = $request->status;

            if ($request->status_module == 'general') {
                $publication->module_id = null;
            } else {
                $publication->module_id = $request->status_module;
            }
        }

        $publication->save();

        //  return 'status';
        if ($request->hasfile('files')) {

            foreach ($request->file('files') as $file) {
                $publication_fichier = new PublicationFichier();
                $publication_fichier->publication_id = $publication->id;
                $publication_fichier->nom_fichier = $file->getClientOriginalName();
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
                $publication_fichier->chemin_fichier = "files/" . $name;
                $publication_fichier->type_fichier = $file->getClientOriginalExtension();
                $publication_fichier->save();
            }

        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::find($id);

        if(!$publication) {
            return view('errorPage');
        }
       return view('modifierpublication')->with('publication',$publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(ModifierPublicationRequest $request,$id)
    {
       $publication = Publication::find($id);
       if(!$publication) {
        return view('errorPage');
    }
       $publication->titre = $request->titre;
       $publication->slug = str_slug($request->titre);
       $publication->module_id = $request->module_id;
       $publication->contenu = $request->contenu;
       $publication->save();
       return  redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {

    }

    public function getAllPublication($id)
    {

        $a = [];
        $publication = Publication::find($id);
        foreach ($publication->likes as $like) {

            array_push($a, $like);
        }

        return $a;
    }

    public function signaler($id) {
        $publication = Publication::find($id);
        $publication->signaler = 1;
        $publication->save();

        foreach(User::all() as $user ) {
            if($user->isAdmin()) {
                
                $user->notify(new  SignalerNotification(Publication::find($publication->id),Auth::user()));
 
            }
         }
        return redirect()->back();
    }

    public function unsignaler($id) {
        $publication = Publication::find($id);
        $publication->signaler = 0;
        $publication->save();
        return redirect()->back();
    }

    public function single_publication($slug) {
        $publication = Publication::where('slug',$slug)->first();
        if(!$publication) {
            return view('errorPage');
        }

        return view('singlePublication')->with('publication',$publication);
    }

    

    public function filtrer_publication_par_module($id) {
        $publications = Publication::where('module_id',$id)->get();
        if(!$publications) {
            return view('errorPage');
        }
        return view('filtrerPublicationParModule')->with('publications',$publications);
    }

}
