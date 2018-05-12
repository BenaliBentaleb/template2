<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departement;

class PortailMemoireController extends Controller
{
   
    


    public function index() {
        $departement = Departement::all();
        return view('portailMemoire')->with('departement',$departement);
    }
}
