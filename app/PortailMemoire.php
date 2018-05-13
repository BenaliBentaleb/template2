<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PortailMemoire extends Model
{
    protected $fillable = [
        'user_id', 'formation_id', 'titre',
        'date', 'encadreur',
        'etudiant1', 'etudiant2', 'etudiant3',
        'etudiant4', 'type', 'fichier',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function rules()
    {
        return [

            'formation_id' => 'required',
            'titre' => 'required',
            'type' => 'required',
            'date' => 'required',
            'encadreur' => 'required',
            'etudiant1' => 'required',
            'fichier' => 'required',
           

        ];
    }
    public static function messages()
    {
        return [
            'formation_id.required' => 'Le champ Specialité est vide !',
            'titre.required' => 'Le champ titre est vide !',

            'type.required' => 'Le champ Niveau est vide !',
            'date.required' => 'Le champ Date  est vide !',
            'encadreur.required' => 'Le champ Encadreur est vide !',
            'etudiant1.required' => 'Le champ Etudiant est vide !',
            'fichier.required' => 'Le champ Document est vide !',

        ];
    }
}
