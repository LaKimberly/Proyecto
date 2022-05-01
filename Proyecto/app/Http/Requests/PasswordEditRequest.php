<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordEditRequest extends FormRequest
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
            'old_password' => 'required|min:4|max:30',
            'new_password' => 'required|min:4|max:30',
            'confirm_password' => 'required|min:4|max:30|equalTo:new_password',
        ];
    }

    public function messages(){
        return[
            'old_password.required' => 'El campo Contraseña actual es obligatorio',
            'old_password.min' => 'El campo Contraseña actual debe tener al menos 4 caracteres.',
            'old_password.max' => 'El campo Contraseña actual debe ser menor que 30 caracteres.',
            'new_password.required' => 'El campo Nueva contraseña es obligatorio',
            'new_password.min' => 'El campo Nueva contraseña debe tener al menos 4 caracteres.',
            'new_password.max' => 'El campo Nueva contraseña debe ser menor que 30 caracteres.',
            'confirm_password.required' => 'El campo Confirmar contraseña es obligatorio',
            'confirm_password.min' => 'El campo Confirmar contraseña debe ser igual al campo Nueva contraseña.',
            'confirm_password.max' => 'El campo Confirmar contraseña debe ser igual al campo Nueva contraseña.',
        ];
    }
}
