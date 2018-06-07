<?php

namespace App;

use App\Categories;
use App\Commentaire;
use App\Faq;
use App\Like;
use App\Module;
use App\PublicationFichier;
use App\Sondage;
use App\Tag;
use App\User;
use App\Suivi;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    // public $with =['user'];
    protected $fillable = [
        'titre', 'contenu', 'user_id', 'type', 'module_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }

    public function publication_avec_fichier()
    {
        return $this->hasMany(PublicationFichier::class);
    }
    public function faq()
    {
        return $this->hasOne(Faq::class);
    }
    public function sondage()
    {
        return $this->hasOne(Sondage::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suivies() {
        return $this->hasMany(Suivi::class);
    }

    // used whene user want to update status!
    public function getModules($id)
    {
        $formation_id = Module::find($id)->formation_id;
        $formation = Formation::find($formation_id);
        $this->collection = collect([]);
        foreach ($formation->modules as $m) {
            $s = Semestre::find($m->semestre->id);
            if (!$this->collection->contains($s->nom)) {
                $this->collection->put($s->nom, $s->modules);
            }
        }
        return $this->collection;

    }

    public function isFollewed($publication,$user) {
        $follow = Suivi::where('publication_id',$publication)->where('user_id',$user)->first();
        if($follow) {
            return false;
        }
        return true;
}

}
