<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
              'description' => 'required|string',
            //
        ];
    }
        /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */

 /**
 * Get custom attributes for validator errors.
 *
 * @return array<string, string>
 */
public function attributes(): array
{
    return [
        'title' => __('Title'),
        'description'=>__('Descrioption'),
    ];
}

public function messages(): array
{
    return [
        'title.required' => 'A :attribute must be written',
        'description.required' => 'please write a :attribute ',
    ];
}
}
