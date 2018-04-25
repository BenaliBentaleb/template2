<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User ; 
use App\Module;
use App\Departement;


class Formation extends Model
{
    protected $fillable = [
        'nom','id','departement_id'
    ];


    public function users() {
        return $this->hasMany(User::class);
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function getSemestreModules($formation,$semestre) {
       return   Module::where('formation_id',$formation)->where('semestre_id',$semestre)->get();
    }
}
