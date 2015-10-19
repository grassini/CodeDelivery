<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;


class AdminProductRequest extends Request
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
            'name' => 'required|min:3|unique:products',
            'description' => 'required|min:10',
            'price' => 'required',
            'category_id' => 'required',
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

            'description.required' => 'A descrição é obrigatória',
            'description.min' => 'A descrição precisa ter no minímo 10 letras.',

            'price.required' => 'O preço é obrigatório.',

            //'category_id.required' => 'É ogrigatório escolher uma categoria.'
        ];
    }
}
