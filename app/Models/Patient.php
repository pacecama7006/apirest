<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombres',
        'apellidos',
        'sexo',
        'edad',
        'curp',
        'tipo_sangre',
        'telefono',
        'correo',
        'direccion',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // Con esta propiedad no mando a la api la información de estos campos
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
