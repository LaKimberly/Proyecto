<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionCreateRequest extends FormRequest
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
            'name' => 'required|unique:permissions|max:120|min:5',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El campo Nombre es obligatorio',
            'name.min' => 'El campo Nombre debe tener al menos 5 caracteres.',
            'name.max' => 'El campo Nombre debe ser menor que 120 caracteres.',
            'name.unique' => 'Este Nombre ya está siendo utilizado. Por favor ingrese uno diferente',
        ];
    }
}
