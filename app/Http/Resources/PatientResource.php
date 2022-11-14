<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Así se aparece cuando se crea el PatientResource
        // return parent::toArray($request);

        // Lo puedo cambiar para que sólo me mande lo que yo quiera, como el id
        // return [
        //     'id' => $this->id,
        // ];

        // Lo puedo cambiar para que sólo me mande lo que yo quiera, como el id,
        // modificar el nombre de la propiedad
        // return [
        //     'identificador' => $this->id,
        // ];
        // Lo puedo cambiar para que sólo me mande lo que yo quiera, como el id,
        // modificar las propiedades
        return [
            'id' => $this->id,
            'nombres' => Str::of($this->nombres)->upper(),
            'apellidos' => Str::of($this->apellidos)->upper(),
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'curp' => $this->curp,
            'tipo_sangre' => $this->tipo_sangre,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y')
        ];
    }

    // Función que me permite añadir propiedades a la respuesta. Aquí agrego la propiedad res
    // Ojo, tienen que ser Propiedades generales, que se repita en todas las respuestas
    public function with($request)
    {
        # code...
        return [
            'res' => 'true',
        ];

    }
}
