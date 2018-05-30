<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
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
     * 
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $formation = new Formation;
       $formation->departement_id = $request->departement;
       $formation->nom = $request->nom;
       $formation->type = $request->type;
       $formation->save();
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::find($id);
        return $formation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formation = Formation::find($id);
        $formation->departement_id = $request->departement;
        $formation->nom = $request->nom;
        $formation->type = $request->type;
        $formation->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return redirect()->back();
    }
}
