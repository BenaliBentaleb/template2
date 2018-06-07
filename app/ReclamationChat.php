<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reclamation;

class ReclamationChat extends Model
{
    
    protected $fillable = [
        'reclamation_id',
        'sender_id',
        'chat'
    ];

    public function reclamation(){
        return $this->belongsTo(Reclamation::class);
    }
}
