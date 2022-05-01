<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $user = $this->route('user');
        return [
            'address' => 'required|min:8|max:255',
            'username' => 'required|min:4|max:48',
            'phonenumber' => 'required|min:10|max:13|unique:users,phonenumber,' . $user->id,
            'email' => 'required|email|unique:users,email,' . request()->route('user')->id,
            'password' => 'sometimes', 'min:4', 'max:30',
        ];
    }

    public function messages(){
        return[
            'address.required' => 'El campo Dirección es obligatorio',
            'address.min' => 'El campo Dirección debe tener al menos 8 caracteres.',
            'address.max' => 'El campo Dirección debe ser menor que 256 caracteres.',
            'username.required' => 'El campo Nombre es obligatorio',
            'username.min' => 'El campo Nombre debe tener al menos 4 caracteres.',
            'username.max' => 'El campo Nombre debe ser menor que 49 caracteres.',
            'phonenumber.required' => 'El campo Número de teléfono es obligatorio',
            'phonenumber.min' => 'El campo Número de teléfono debe tener al menos 10 caracteres.',
            'phonenumber.max' => 'El campo Número de teléfono debe ser menor que 14 caracteres.',
            'phonenumber.unique' => 'Este número de teléfono ya está siendo utilizado. Por favor ingrese uno diferente',
            'email.required' => 'El campo Email es obligatorio',
            'email.unique' => 'Este email ya está siendo utilizado. Por favor ingrese uno diferente',
            'password.min' => 'El campo Contraseña debe tener al menos 4 caracteres.',
            'password.max' => 'El campo Contraseña debe ser menor que 30 caracteres.',
        ];
    }
}
