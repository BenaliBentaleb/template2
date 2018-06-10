<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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

            'titre' => 'required|string',
            'event_role' => 'required',
            
            'formation_id' => 'required',
            'description' => 'required',
            'contenu' => 'required',
            'debut' => 'required|date',
            'fin' => 'required|date'
            
           

        ];
    }

    public function messages()
    {

        return [
            'titre.string' => 'titre doit etre une chaine de caractére.',
            'titre.required' => 'Svp remplir  le champ titre.',
            'event_role.required' => 'Svp remplir  le champ role.',
            'formation_id.required' => 'Svp selectioner  la formation.',
            'description.required' => 'Svp remplir  le champ description.',
            'contenu.required' => 'Svp remplir  le champ contenu.',
            'debut.required' => 'Svp remplir  le champ date debut.',
            'fin.required' => 'Svp remplir  le champ date fin.',
            'debut.required' => ' date debut doit etre  de type date .',
            'fin.required' => ' date fin doit etre  de type date .'
        ];
    }

}
