<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|string|max:255',
            'buyingprice'   => 'required|numeric|min:0',
            'sellingprice'  => 'required|numeric|min:0',
            'color'         => 'required|string|max:100',
            'size'          => 'required|string|max:100',
            'totalquantity' => 'required|integer|min:0',
            'brand'         => 'required|string|max:255',
            'fabric'        => 'required|string|max:255',
            'catname'       => 'required|string|exists:categories,catname',
            'subcatname'    => 'required|string|exists:sub_categories,subcatname',
            'description'   => 'required|string',
            'picture'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
