<?php

namespace App\Http\Controllers;

use App\Sondage;
use Illuminate\Http\Request;
use App\Publication;
use Auth;

class SondageController extends Controller
{


    public function get_publication_of_sondage($id) {

        $publication = Sondage::where('publication_id',$id)->first();
        $sondage = $publication->sondage_choix;

        return $sondage;

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



         /* $f =  $request->files ; 
          foreach($f as $fil)
            {
               return $fil[0]->getClientOriginalName();

            }*/

           // dd($request);

    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       return view('sondage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function edit(Sondage $sondage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sondage $sondage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sondage  $sondage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sondage $sondage)
    {
        //
    }
}
