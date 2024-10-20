<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $municipioId = $this->route('municipio') ? $this->route('municipio')->id : null;

        return [
            'nombre' => [
                            'required',
                            'string',
                            'max:255',
                            // Verifica que el nombre sea único en la tabla municipios
                            'unique:municipios,nombre,' . $municipioId,
                        ],
            'departamento_id' => 'required|exists:departamentos,id', // Campo requerido y debe existir en la tabla departamentos
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del departamento es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre ya esta registrado en la base de datos',
            'departamento_id.required' => 'El país es obligatorio.',
            'departamento_id.exists' => 'El país seleccionado no es válido.',
        ];
    }
}
