<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publication;
use App\User;
use App\JaimeCommentaire;

class Commentaire extends Model
{
    public $with =['user','likes','publication'];
    protected $fillable = [
        'publication_id','commentaire','user_id'
    ];

    public function publication() {
        return $this->belongsTo(Publication::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->hasMany(JaimeCommentaire::class);
    }
}
