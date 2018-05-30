<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semestre;

class SemestreController extends Controller
{
   public function store(Request $request) {
        
        $semestre = new Semestre;
        $semestre->nom = $request->nom;
        $semestre->save();
        return redirect()->back();
   }

   public function update($id,Request $request) {
        
        $semestre =  Semestre::find($id);
        $semestre->nom = $request->nom;
        $semestre->save();
        return redirect()->back();
   }

   public function destroy($id) {
        
    $semestre =  Semestre::find($id);
    $semestre->delete();
    return redirect()->back();
}


}
