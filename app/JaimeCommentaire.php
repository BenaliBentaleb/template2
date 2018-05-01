<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commentaire;
use App\User;

class JaimeCommentaire extends Model
{
    public $with= ['user'];
    protected $fillable = [
        'commentaire_id','user_id'
    ];


    public function commentaire() {
        return $this->belongsTo(Commentaire::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
