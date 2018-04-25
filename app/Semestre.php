<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Semestre extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function modules() {
        return $this->hasMany(Module::class);
    }
}
