<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($this->user),
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Customer name is required",
            'name.min' => "Customer name can't be less than 3 chars",
            'name.string' => "Customer name must be String ",
            'email.required' => "Customer mail is required",
            'email.unique' => "Customer already exist",
        ];
    }
        
    
}
