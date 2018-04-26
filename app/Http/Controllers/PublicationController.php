<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use App\PublicationFichier;
use Auth;

class PublicationController extends Controller
{
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
        
        
        $publication->user_id = Auth::id();
       

      if($request->type) {
        $publication->type =  $request->type; //blog
        $publication->contenu = $request->blog;
      }else{
        $publication->type = 'status';
        $publication->contenu = $request->status;
      }
      if($request->status_module =='general') {
        $publication->module_id = null;
      }else {
        $publication->module_id = $request->status_module;
      }

      $publication->save();


   //  return 'status';
   if($request->hasfile('files'))
   {
    
      foreach($request->file('files') as $file)
      {
        $publication_fichier= new PublicationFichier();
        $publication_fichier->publication_id = $publication->id;
          $name=time().$file->getClientOriginalName();
          $file->move(public_path().'/files/', $name);  
          $data[] = $name;  
          $publication_fichier->chemin_fichier = "/files/".$name;
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
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
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
}
