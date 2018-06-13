<?php

namespace App;

use App\Formation;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PortailMemoire extends Model
{
    protected $fillable = [
        'user_id', 'formation_id', 'titre',
        'date', 'encadreur',
        'etudiant1', 'etudiant2', 'etudiant3',
        'etudiant4', 'type', 'fichier',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    
  
    // get formation name  ex: 1 => Ti
    public function getFormation($id)
    {
        return Formation::find($id)->nom;

    }
}
