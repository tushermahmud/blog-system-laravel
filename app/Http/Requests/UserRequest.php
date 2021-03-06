<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules= [
            'name'      =>'required|unique:users',
            'email'     =>'required|unique:users,email',
            'password'  =>'required|confirmed',
            'created_at'=>'required',
            'role'      =>'required',
        ];
        switch($this->method()){
            case 'PUT':
            case 'PATCH':
            $rules['name']='required';
            $rules['email']='required';
            $rules['password']  ='required_with:password_confirmation|confirmed';
           
            break;
        }
        return $rules;
    }
}
