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
       
        'numero_telephone' => 'required|numeric',
        'date_naissance' => 'required',
        'addresse' => 'required',
        'informations' => 'required'
        
    ];
}
   public static function messages()
{
    return [
        'addresse.required' => 'Le champ Adresse est vide !',
        'formation.required' => 'Le champ Formation est vide !',
        'numero_telephone.required' => 'Le champ Numéro de téléphone est vide !',
        'numero_telephone.numeric' => 'Le Numéro de téléphone doit etre numerique !',
        'date_naissance.required' => 'Le champ Date de naissance est vide !',
        'informations.required' => 'Le champ A propos est vide !'
     
    ];
}
}
