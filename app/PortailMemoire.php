<?php

namespace App;

use App\Formation;
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

            'formation' => 'required',
            'titre' => 'required',
            'niveau' => 'required',
            'annee' => 'required',
            'encadreur' => 'required',
            'etudiant1' => 'required',
            'fichier' => 'required',

        ];
    }
    public static function messages()
    {
        return [
            'formation.required' => 'Le champ Specialité est vide !',
            'titre.required' => 'Le champ titre est vide !',

            'niveau.required' => 'Le champ Niveau est vide !',
            'annee.required' => 'Le champ Date  est vide !',
            'encadreur.required' => 'Le champ Encadreur est vide !',
            'etudiant1.required' => 'Le champ Etudiant est vide !',
            'fichier.required' => 'Le champ Document est vide !',

        ];
    }
    // get formation name  ex: 1 => Ti
    public function getFormation($id)
    {
        return Formation::find($id)->nom;

    }
}
