<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;
class DepartementController extends Controller
{
   public function __construct() {
       $this->middleware('admin');
   }


    public function store(Request $request) {
        $dep = new Departement;
        $dep->nom = $request->nom;
        $dep->save();
        return redirect()->back();
    }

    public function show_all(Request $request) {
        $deps = Departement::all();
        return $deps;
    }
    

    public function edit($id,Request $request) {
        $dep = Departement::find($id);
        $dep->nom = $request->nom;
        $dep->save();
        return redirect()->back();
    }

    public function delete($id,Request $request) {
        $dep = Departement::find($id);
        $dep->delete();
        return redirect()->back();
    }

}
