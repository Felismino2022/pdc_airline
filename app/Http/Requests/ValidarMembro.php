<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarMembro extends FormRequest
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
            'name' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'sobrenome' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'morada' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i',
            'telefone' => 'required|regex:/^[9][0-9]+$/|min:9',
            'password' => 'required|regex:/^[0-9][0-9]+$/i|min:4',
            'morada' => 'required|regex:/^[a-zá-ùÁ-Ù][a-zá-ùÁ-Ù]+$/i'
        ];
    }
}
