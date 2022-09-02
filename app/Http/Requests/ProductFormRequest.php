<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'unit' => 'required',
            'quantity' => 'required|integer',
            'image' => 'image',
        ];
    }
    public function messages()
    {
        return [
            // 'price.numeric' => 'Price must have a numric value',
            // 'unit.numeric' => 'Unit must be a number',
            'image.image' => 'File must be a valid image'
        ];
    }
}
