<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|integer',
            'email' => 'nullable|email',
            'description' => 'nullable|string',
            'is_married' => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'have to add name',
        ];
    }
}




