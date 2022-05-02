<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productName' => 'required|max:80|min:5|unique:products,productName,' . $products->id,
            'productPrice' => 'required|max:5|min:3',
            'ProductDescription' => 'required|max:255|min:5',
            'productQualication' => 'required|max:1|min:1',
            'image' => 'required',
        ];
    }

    public function messages(){
        return[
            'productName.required' => 'El campo Nombre de producto es obligatorio',
            'productName.min' => 'El campo Nombre de producto debe tener al menos 5 caracteres.',
            'productName.max' => 'El campo Nombre de producto debe ser menor que 80 caracteres.',
            'productName.unique' => 'Este nombre de producto ya está siendo utilizado. Por favor ingrese uno diferente',
            'productPrice.required' => 'El campo Precio de producto es obligatorio',
            'productPrice.min' => 'El campo Precio de producto debe tener al menos un número de 3 cifras.',
            'productPrice.max' => 'El campo Precio de producto debe ser menor un número de 5 cifras.',
            'ProductDescription.required' => 'El campo Descripción de producto es obligatorio',
            'ProductDescription.min' => 'El campo Descripción de producto debe tener al menos 5 caracteres.',
            'ProductDescription.max' => 'El campo Descripción de producto debe ser menor 255 caracteres.',
            'productQualication.required' => 'El campo Calificación de producto es obligatorio',
            'productQualication.min' => 'El campo Calificación de producto debe tener al menos 1 caracteres.',
            'productQualication.max' => 'El campo Calificación de producto debe ser menor 1 caracteres.',
            'image.required' => 'El campo Imagen de producto es obligatorio',
        ];
    }
}
