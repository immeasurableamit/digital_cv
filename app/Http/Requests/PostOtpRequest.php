<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostOtpRequest extends FormRequest
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
            'otp' => 'required',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *@return array
    */
    public function messages()
    {
        return [
            'otp.required' => 'OTP is required',

        ];
    }
}
