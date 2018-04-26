<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use App\PublicationFichier;
use Auth;
use App\Publication;

class FaqController extends Controller
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
        $publication->type = 'faq'; 
        $publication->contenu = $request->faq;

        if($request->faq_module =='general') {
            $publication->module_id = null;
          }else {
            $publication->module_id = $request->faq_module;
          }

          $publication->save();

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
          $faq  = new Faq;
          $faq->publication_id = $publication->id;
          $faq->meilleur_reponse = 0;
          $faq->save();

          return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
