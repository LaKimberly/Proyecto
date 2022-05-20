<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'productName' => 'required|unique:products|max:48|min:4|
            regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+$/',
            'productPrice' => 'required|max:5|min:3|regex:/^([1-9])[0-9]{2,4}$/',
            'ProductDescription' => 'required|max:255|min:5',
            'productQualication' => 'required|max:1|min:1|regex:/^[0-5]$/',
            'imagenes' => 'required|image|max:4096',
        ];
    }

    public function messages(){
        return[
            'productName.required' => 'El campo Nombre de producto es obligatorio',
            'productName.min' => 'El campo Nombre de producto debe tener al menos 5 caracteres.',
            'productName.max' => 'El campo Nombre de producto debe ser menor que 80 caracteres.',
            'productName.unique' => 'Este nombre de producto ya está siendo utilizado. Por favor ingrese uno diferente',
            'productName.regex' => 'El formato del campo nombre de producto no es válido.',
            'productPrice.required' => 'El campo Precio de producto es obligatorio',
            'productPrice.min' => 'El campo Precio de producto debe tener al menos un número de 3 cifras.',
            'productPrice.max' => 'El campo Precio de producto debe ser menor un número de 5 cifras.',
            'productPrice.regex' => 'El formato del campo precio del producto no es válido.',
            'ProductDescription.required' => 'El campo Descripción de producto es obligatorio',
            'ProductDescription.min' => 'El campo Descripción de producto debe tener al menos 5 caracteres.',
            'ProductDescription.max' => 'El campo Descripción de producto debe ser menor 255 caracteres.',
            'productQualication.required' => 'El campo Calificación de producto es obligatorio',
            'productQualication.min' => 'El campo Calificación de producto debe tener al menos 1 caracteres.',
            'productQualication.max' => 'El campo Calificación de producto debe ser menor 1 caracteres.',
            'productQualication.regex' => 'El formato del campo calificación del producto no es válido.',
            'imagenes.required' => 'El campo Imagen de producto es obligatorio',
            'imagenes.max' => 'El campo Imagen de producto no debe superar un tamaño de 4 MB',
        ];
    }
}
