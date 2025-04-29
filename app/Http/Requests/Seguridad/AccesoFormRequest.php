<?php

namespace App\Http\Requests\Seguridad;

use Illuminate\Foundation\Http\FormRequest;

class AccesoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'usuarioEmail' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'usuarioEmail.required' => 'El campo usuario es requerido.',
            'password.required' => 'El campo contraseña es requerido.'
        ];
    }
}
