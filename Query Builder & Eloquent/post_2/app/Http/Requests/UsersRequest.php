<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ];
    }
    /**
     * 
     */
    public function messages()
    {
        return[
            'name.required'=>'You need to input!!!!',
            'email.required'=>'You need to input!!!!',
            'password.required'=>'You need to input!!!!'
        ];
    }
}
