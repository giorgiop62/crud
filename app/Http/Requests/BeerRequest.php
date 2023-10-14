<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeerRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'price' => 'required',
            'image' => 'required|min:10|max:255',
        ];
    }

    public function message(){
        return [
            'name.required' => 'il nome è un campo obbligatorio',
            'name.min' => 'il nome deve avere almeno : min caratteri',
            'name.max' => 'il nome deve avere almeno : max caratteri',
            'price.required' => 'il prezzo è un campo obbligatorio',

        ];
    }
}
