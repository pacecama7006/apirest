<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Devolvemos todos los pacientes en formato json
        // return Patient::all();

        //Otra forma con el PatientResource
        //Devolvemos todos los pacientes utilizando el patientResource Me lo devuelve como un array
        return PatientResource::collection(Patient::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        //Creamos un paciente 1a forma
        // Patient::create($request->validated());
        // Regresamos una respuesta
        // return response()->json([
        //     'res' => 'true',
        //     'message' => 'Paciente guardado correctamente',
        // ],200);
        
        // Otra forma
        return (new PatientResource(Patient::create($request->all())))
            ->additional([
                'mensaje' => 'Paciente guardado correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //Muestra los datos de un paciente en json
        // return response()->json([
        //     'res' => 'true',
        //     'paciente' => $patient,
        // ],200);

        // Otra forma usando el patientResource Me lo devuelve como un array
        return (new PatientResource($patient));
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
        $patient->update($request->validated());
        // $patient->update($request->all());

        // return response()->json([
        //     'res' => 'true',
        //     'message' => 'El paciente se actualizó con éxito',
        // ],200);

        // Otra forma con el PatientResource
        return (new PatientResource($patient))
            ->additional([
                'mensaje' => 'El paciente se actualizó con éxito',
            ])
            ->response()
            ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
        $patient->delete();

        // return response()->json([
        //     'res' => 'true',
        //     'message' => 'Paciente eliminado correctamente',
        // ],200);

        // Otra forma con el PatientResource
        return (new PatientResource($patient))
            ->additional([
                'mensaje' => 'Paciente eliminado correctamente'
            ]);
    }
}
