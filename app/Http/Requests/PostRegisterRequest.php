<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
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
            // 'phone' => 'required|numeric|phone_number|size:11',
            'company_name' => ['required'],
            'designation' => ['required'],
            'address' => ['required'],
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *@return array
    */
    public function messages()
    {
        return [
            'phone.required' => 'Enter a valid number!',
            'company_name.required' => 'Company name is required',
            'designation.required' => 'Designation is required',
            'address.required' => 'Address is required',
        ];
    }
}
