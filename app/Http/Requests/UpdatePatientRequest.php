<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'edad' => 'required',
            // 'curp' => 'required|unique:patients,curp,' . $this->route('patient')->id,
            'curp' => 'required|unique:patients,curp,' . $this->patient->id,
            'tipo_sangre' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
        ];
    }
}
