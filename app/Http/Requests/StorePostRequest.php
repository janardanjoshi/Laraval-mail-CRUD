<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confimation' => 'required|same:password',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name' => 'Place Enter Your Name',
            'email' => 'Place Enter Validate Email',
            'address' => 'Place Enter Your proper Address',
            'dob' => 'Place Enter Your Date og Birth',
            'required' => 'This fild is Required'
        ];
    }
}
