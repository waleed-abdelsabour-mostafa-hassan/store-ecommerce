<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * @var mixed
     */
    /**
     * @var mixed
     */

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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this -> id,
            'password' => 'nullable|confirmed|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الأسم ',
            'email.required' => 'يجب ادخال البريد الألكترونى ',
            'email.email' => 'صيخة البريد الألكترونى غير صحيحه    ',
            'email.unique' => 'هذا البريد الألكترونى  مستخدم من قبل    ',
        ];
    }
}
