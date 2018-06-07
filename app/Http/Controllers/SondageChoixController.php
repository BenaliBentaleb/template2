<?php

namespace App\Http\Controllers;

use App\SondageChoix;
use App\Publication;
use Auth;
use App\Sondage;
use Illuminate\Http\Request;

class SondageChoixController extends Controller
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
        $publication->user_id = Auth::id();
        $publication->module_id = $request->module_id;
        $publication->titre = $request->titre;
        $publication->slug = str_slug($request->titre);
        $publication->contenu = $request->sondage;
        $publication->type = 'Sondage';
        $publication->save();

        $sondage = new Sondage;
        $sondage->publication_id = $publication->id;
        $sondage->save();

       
        for($i= 1 ;$i<6;$i++) {
            $choix ="choix".$i;       
            if($request->$choix) {
                $sondage_choix = new SondageChoix;
                $sondage_choix->sondage_id = $sondage->id;
                $sondage_choix->choix = $request->$choix;
                $sondage_choix->save();
            }
          
        }

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SondageChoix  $sondageChoix
     * @return \Illuminate\Http\Response
     */
    public function show(SondageChoix $sondageChoix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SondageChoix  $sondageChoix
     * @return \Illuminate\Http\Response
     */
    public function edit(SondageChoix $sondageChoix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SondageChoix  $sondageChoix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SondageChoix $sondageChoix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SondageChoix  $sondageChoix
     * @return \Illuminate\Http\Response
     */
    public function destroy(SondageChoix $sondageChoix)
    {
        //
    }
}
