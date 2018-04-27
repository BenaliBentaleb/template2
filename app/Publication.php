<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
use App\PublicationFichier;
use App\Faq;
use App\Sondage;
use App\Tag;
use App\Commentaire;
use App\Like;
use App\Module;
use App\User;
class Publication extends Model
{
  // public $with =['user','likes'];
    protected $fillable = [
        'titre','contenu','user_id','type','module_id'
    ];


    public function categorie() {
        return $this->belongsTo(Categories::class);
    }

    public function publication_avec_fichier() {
        return $this->hasOne(PublicationFichier::class);
    }
    public function faq() {
        return $this->hasOne(Faq::class);
    }
    public function sondage() {
        return $this->hasOne(Sondage::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function module() {
        return $this->belongsTo(Module::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
