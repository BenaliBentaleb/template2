<?php

namespace App;

use App\Amies;
use App\Commentaire;
use App\Formation;
use App\JaimeCommentaire;
use App\Like;
use App\Notifications\ResetPasswordNotification;
use App\profile;
use App\Publication;
use App\Reclamation;
use App\Role;
use App\Traits\friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use friendable;

    public $with = ['profile', 'formation'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nom', 'prenom', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(profile::class);
    }
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function likeComment()
    {
        return $this->hasOne(JaimeCommentaire::class);
    }

    public function amies()
    {
        return $this->hasMany(Amies::class);
    }
//* chat methods */
    public function friendsOfMine()
    {
        return $this->belongsToMany('App\User', 'amies', 'user_id', 'friend_id');
    }
    public function friendOf()
    {
        return $this->belongsToMany('App\User', 'amies', 'friend_id', 'user_id');
    }
    public function friendss()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }
    public function portailmemoires()
    {
        return $this->hasMany(PortailMemoire::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
