<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nom' => 'required|regex:/^[a-zA-Z1-2]+$/',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'svp rempli le champ Nom',
            //  'nom.unique'=>'le nom de departement doit etre unique',
            'nom.regex' => 'le nom de Module doit etre une chaine de caractére '
           // 'nom.string' => 'le nom de Module doit etre une chaine de caractére '

        ];
    }
}
