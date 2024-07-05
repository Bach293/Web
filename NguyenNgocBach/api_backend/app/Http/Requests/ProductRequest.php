<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($productId)],
            'slug' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($productId)],
            'description' => ['nullable', 'string'],
            'discount_amount' => ['nullable', 'numeric'],
            'price' => ['required', 'numeric'],
            'status' => ['required', Rule::in([0, 1, 2])],
            'draft_content' => ['nullable', 'string'],
            'stock_quantity' => ['required', 'integer'],
            'trademark' => ['nullable', 'string', 'max:255'],
            'warranty_period' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'ship_from' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'string', 'url', 'max:2048'],
            'variants' => ['nullable', 'array'],
            'variants.*.color' => ['nullable', 'string', 'max:50'],
            'variants.*.price' => ['nullable', 'numeric'],
            'variants.*.stock_quantity' => ['nullable', 'integer'],
        ];
    }
}
