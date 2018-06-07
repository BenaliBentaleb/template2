<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publication;

class Suivi extends Model
{
   
    protected $fillable = [
        'user_id','publication_id'
    ];

    public function publication() {
        return $this->belongsTo(Publication::class);
    }
}
