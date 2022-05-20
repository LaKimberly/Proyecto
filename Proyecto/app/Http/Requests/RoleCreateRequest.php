<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
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
            'name' => 'required|unique:roles|max:90|min:3|
            regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð _]+$/',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El campo Nombre es obligatorio',
            'name.min' => 'El campo Nombre debe tener al menos 3 caracteres.',
            'name.max' => 'El campo Nombre debe ser menor que 90 caracteres.',
            'name.unique' => 'Este Nombre ya está siendo utilizado. Por favor ingrese uno diferente',
            'name.regex' => 'El formato del campo nombre no es válido.',
        ];
    }
}
