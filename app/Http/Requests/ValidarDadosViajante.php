<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarDadosViajante extends FormRequest
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
            'nameadulto1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'sobrenomeadulto1' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'telefone1' => 'required|regex:/^[9][0-9]+$/|min:9'
        ];
    }
}
