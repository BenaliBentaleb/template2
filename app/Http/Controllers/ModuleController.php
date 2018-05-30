<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        $module = new Module;
        $module->formation_id = $request->formation;
        $module->semestre_id = $request->semestre;
        $module->nom = $request->nom;
        $module->save();
        return redrect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $module =  Module::find($id);
        $module->formation_id = $request->formation;
        $module->semestre_id = $request->semestre;
        $module->nom = $request->nom;
        $module->save();
        return redrect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module =  Module::find($id);
        $module->delete();
        return redrect()->back();
    }
}
