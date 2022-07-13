<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'username' => 'required|min:5',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập username',
            'username.min' => 'Vui lòng nhập ít nhất :min kí tự',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập ít nhất :min kí tự',
        ];
    }
}
