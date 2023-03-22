<?php

namespace App\Http\Requests;

class UpdateProductRequest extends ProductRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (auth()->user() !== null && auth()->user()->role === config('products.role.admin')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:10|max:255',
            'article' => 'required|max:255|regex:/^[A-Za-z0-9]+$/'
        ];
    }
}
