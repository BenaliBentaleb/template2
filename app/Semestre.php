<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class Semestre extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function module() {
        return $this->hasMany(Module::class);
    }
}
