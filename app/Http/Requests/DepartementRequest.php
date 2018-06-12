<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class DepartementRequest extends FormRequest
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
            'nom'=> 'required'//|regex:/^[A-Z ]+$/'
        ];
    }

    public function messages() {
        return [
            'nom.required'=>'svp rempli le champ Nom',
          //  'nom.unique'=>'le nom de departement doit etre unique',
           // 'nom.regex'=>'le nom de departement doit etre une chaine de caractére et majuscule'
        ];
    }
}
