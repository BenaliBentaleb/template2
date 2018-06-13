<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemoireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public  function rules()
    {
        return [

            'formation_id' => 'required',
            'titre' => 'required',
            'type' => 'required',
            'date' => 'required|after:1989|before_or_equal:'.date("Y"),
            'encadreur' => 'required',
            'etudiant1' => 'required',
           'fichier' => 'required',

        ];
    }
    public  function messages()
    {
        return [
            'formation_id.required' => 'Le champ Specialité est vide !',
            'titre.required' => 'Le champ titre est vide !',

            'type.required' => 'Le champ type est vide !',
            'date.required' => 'Le champ Date  est vide !',
            'date.after' => 'Le champ Date  est inferieur a 1990 !',
            'date.before_or_equal' => 'Le champ Date  est superieur a '.date("Y"),
            'encadreur.required' => 'Le champ Encadreur est vide !',
            'etudiant1.required' => 'Le champ Etudiant est vide !',
           'fichier.required' => 'Le champ Document est vide !',

        ];
    }
}
