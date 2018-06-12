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
            'debut' => 'required|date|date_format:Y-m-d|after:yesterday',
            'fin' => 'required|date|date_format:Y-m-d|after_or_equal:debut'
            
           

        ];
    }

    public function messages()
    {

        return [
            'titre.string' => 'titre doit etre une chaine de caractére.',
            'titre.required' => 'Svp rempli  le champ titre.',
            'event_role.required' => 'Svp rempli le champ role.',
            'formation_id.required' => 'Svp selectioner  la formation.',
            'description.required' => 'Svp rempli  le champ description.',
            'contenu.required' => 'Svp rempli  le champ contenu.',
            'debut.required' => 'Svp rempli  le champ date debut.',
            'fin.required' => 'Svp rempli  le champ date fin.',
            'debut.after' => 'date debut doit etre d aujourdhui ou superieur.',
             'fin.after_or_equal' => 'date fin doit etre  superieur ou egal a la date debut. '
        ];
    }

}
