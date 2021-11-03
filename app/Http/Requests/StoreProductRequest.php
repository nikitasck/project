<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            
            'manufacture' => 'required|max:255',
            'name' => 'required|max:255|unique:products',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|exists:categories,id',
            
            //'img_id' => 'required|exists:imgs,id',
            //'color_id' => 'exists:colors,id',
            //'storage_id' => 'exists:storages,id',
            //'size_id' => 'exists:sizes,id',

        ];
    }
}
