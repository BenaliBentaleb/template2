<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                
        ];
    }

    public  function messages()
    {

    return [
        'nom.string' => 'Nom doit etre une chaine de caractére.',
        'nom.required' => 'Svp remplir  le champ nom.',
        'prenom.required' => 'Svp remplir  le champ prenom.',
        'prenom.string'  => 'Prenom doit etre une chaine de caractere.',
        'email.unique'  => 'Email est deja exist.',
        'email.email'  => 'Email doit etre un vrai email.',
        'password.min'  => 'mot de passe  doit etre au minimant 6 caractére.',
        'password.required'  => 'Svp remplir  le champ mot de passe. ',
        'password.confirmed'  => ' mot de passe non confirmer. ',
        'email.required'  => 'Svp remplir  le champ email.',
    ];
}
}
