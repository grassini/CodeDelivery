<?php
namespace CodeDelivery\Http\Requests;


use CodeDelivery\Http\Requests\Request;


class AdminClientRequest extends Request
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
        return  [
            'user.name'    => 'required',
            'user.email'   => 'required|email|unique:users,email',
            'phone'   => 'required',
            'address' => 'required',
            'city'    => 'required',
            'state'   => 'required',
            'zipcode' => 'required',
        ];

    }



    /**
     * Custumizando as Mensagem de Error
     */
    public function messages()
    {
        return [
            'user.name.required' => 'O Nome é Obrigatório.',
            'user.email.required' => 'O email é obrigatório.',
            'user.email.email' => 'O email digitado não é valido!',
            'user.email.unique' => 'Esse email já consta em nosso banco de dados!',
            'phone.required' => 'O telefone é obrigatório.',
            'address.required' => 'O Endereço é obrigatório.',
            'city.required' => 'A Cidade é obrigatória.',
            'zipcode.required' => 'A Cidade é obrigatória.',
        ];
    }

}