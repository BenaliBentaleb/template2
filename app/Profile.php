<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
   protected $fillable =  [
   'user_id', 'photo_profile','telephone','formation_id','date_naissance','information','facebook','email',
   'twitter','addresse','youtube','instagram','coverture'
   ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function formation() {
        return $this->belongsTo(Formation::class);
    }


   public static  function rules(){
    return [
        'formation' => 'required',
        'numero_telephone' => 'nullable|numeric|digits:10',
        'facebook' => 'nullable|url',
        'twitter' => 'nullable|url',
        'instagram' => 'nullable|url',
        'youtube' => 'nullable|url'
        
    ];
}
   public static function messages()
{
    return [
        'addresse.required' => 'Le champ Adresse est vide !',
        'formation.required' => 'Le champ Formation est vide !',
        'numero_telephone.numeric' => 'Le Numéro de téléphone doit etre numerique !',
        'numero_telephone.digits' => 'Le numéro de téléphone doit être composé de 10 chiffres !',
        'date_naissance.required' => 'Le champ Date de naissance est vide !',
        'informations.required' => 'Le champ A propos est vide !',
        'facebook.url' => "Le lien de profil Facebook n'est pas valide !",
        'twitter.url' => "Le lien de profil Twitter n'est pas valide !",
        'instagram.url' => "Le lien de profil Instagram n'est pas valide !",
        'youtube.url' => "Le lien de profil Youtube n'est pas valide !",
     
    ];
}
}
