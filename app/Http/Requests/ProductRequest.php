<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:190', 'min:5'],
            'description' => ['nullable', 'string', 'max:190', 'min:5'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'categories_id' => ['required', 'min:1'],
            'quantity' => ['required', 'numeric', 'digits_between:1,19'],
            'unit_price' => ['required', 'numeric', 'digits_between:1,19'],
            'selling_price' => ['required', 'numeric', 'digits_between:1,19'],
            'notes' => ['nullable', 'string', 'max:190', 'min:5'],
            'status' => ['required', 'numeric', 'digits_between:1,4'],  
        ];
    }
}
