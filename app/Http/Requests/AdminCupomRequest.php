<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;


class AdminCupomRequest extends Request
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
            'code' => 'required',
            'value' => 'required'
        ];

    }

    /**
     * Custumizando as Mensagem de Error
    */
    public function messages()
    {
        return [
            'code.required' => 'O Código é Obrigatório',
            'value.required' => 'O Valor é Obrigatório'
        ];
    }
}
