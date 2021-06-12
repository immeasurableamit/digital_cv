<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobRequest extends FormRequest
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
            'title' => 'required',
            'job_skills' => 'required',
            'description' => 'required',
            'career_level' => 'required',
            'ctc' => 'required',
            'salary' => 'required',
            'job_type_id' => 'required',
            'job_shift_id' => 'required',
            'gender' => 'required',
            'expiry_date' => 'required',
            'degree_level' => 'required',
            'job_experience' => 'required',
            'contact_us' => 'required|min:12|numeric',

        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
    public function messages()
    {
        return [

        ];
    }
}
