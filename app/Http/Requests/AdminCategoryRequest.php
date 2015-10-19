<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;


class AdminCategoryRequest extends Request
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
            'name' => 'required|min:3|unique:categories'
        ];

    }

    /**
     * Custumizando as Mensagem de Error
    */
    public function messages()
    {
        return [
            'name.required' => 'O Nome é Obrigatório',
            'name.min' => 'O Nome precisa ter no minímo 03 letras.',
            'name.unique' => 'Este nome já existe no banco de dados'
        ];
    }
}
