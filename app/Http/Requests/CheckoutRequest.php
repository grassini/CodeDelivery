<?php
namespace CodeDelivery\Http\Requests;



class CheckoutRequest extends Request
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
            'cupom_code' => 'exists:cupoms, code, used,0'
        ];

    }



    /**
     * Custumizando as Mensagem de Error
     */
    public function messages()
    {
        return [

        ];
    }

}