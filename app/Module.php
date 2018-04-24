<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Formation;
use App\Semestre;
class Module extends Model
{
    protected $fillable = [
        'nom','formation_id','semestre_id'
    ];


    public function formation() {
        return $this->belongsTo(Formation::class);
    } 

    public function publication() {
        return $this->hasMany(Publication::class);
    }
    public function semestre() {
        return $this->belongsTo(Semestre::class);
    }
}
