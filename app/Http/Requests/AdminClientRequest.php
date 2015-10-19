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
        $rules = [
//            'name'    => 'required',
//            'email'   => 'required|email|unique:users,email',
//            'password'=> 'required',
//            'phone'   => 'required',
//            'address' => 'required',
//            'city'    => 'required',
//            'state'   => 'required',
//            'zipcode' => 'required',
        ];

        if($this->segment(3) == 'admin' || $this->segment(3) == 'update'){
            unset($rules['email']);
            $rules['password'] = '';
        }

        return $rules;
    }
}