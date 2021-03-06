<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed value
 * @property mixed plain_value
 */
class ShippingsRequest extends FormRequest
{
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
            'id' => 'required|exists:settings',
            'value' => 'required',
            'plain_value' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'يجب ادخال الكود ',
            'id.exists' => 'يجب أن يكون الكود موجود ',
            'value.required' => ' يجب ادخال وسيلة التوصيل',
            'plain_value.numeric' => 'يجب ادخال رقم  ',
        ];
    }
}
