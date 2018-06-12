<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReclamationRequest extends FormRequest
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
            'title' => 'required|string',
            'reclamation'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'svp rempli le champ titre',
            //  'nom.unique'=>'le nom de departement doit etre unique',
            'title.string' => 'le nom de Module doit etre une chaine de caractére ',
            'reclamation.required' => 'svp rempli le  contenu  de votre reclamation'

        ];
    }
}
