<?php

namespace App\Utils;

use Illuminate\Http\Request;

class ProfesorValidation
{

    public static function Create(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'cedula' => 'required|string|max:10|unique:profesores,cedula',
                'asignatura_id' => 'required|integer|exists:asignaturas,id',
            ],
            [
                'nombre.required' => 'El nombre es requerido',
                'nombre.string' => 'El nombre debe ser un string',
                'nombre.max' => 'El nombre no puede superar los 50 caracteres',
                'apellido.required' => 'El apellido es requerido',
                'apellido.string' => 'El apellido debe ser un string',
                'apellido.max' => 'El apellido no puede superar los 50 caracteres',
                'cedula.required' => 'La cedula es requerida',
                'cedula.string' => 'La cedula debe ser un string',
                'cedula.max' => 'La cedula no puede superar los 10 caracteres',
                'cedula.unique' => 'La cedula ya se encuentra registrada',
                'asignatura_id.required' => 'La asignatura es requerida',
                'asignatura_id.integer' => 'La asignatura debe ser un entero',
                'asignatura_id.exists' => 'La asignatura no se encuentra registrada',
            ]
        );
    }

    public static function Update(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:50',
            'apellido' => 'string|max:50',
            'cedula' => 'string|max:10|unique:profesores,cedula',
            'asignatura_id' => 'integer|exists:asignaturas,id',
        ], [
            'nombre.string' => 'El nombre debe ser un string',
            'nombre.max' => 'El nombre no puede superar los 50 caracteres',
            'apellido.string' => 'El apellido debe ser un string',
            'apellido.max' => 'El apellido no puede superar los 50 caracteres',
            'cedula.string' => 'La cedula debe ser un string',
            'cedula.max' => 'La cedula no puede superar los 10 caracteres',
            'cedula.unique' => 'La cedula ya se encuentra registrada',
            'asignatura_id.integer' => 'La asignatura debe ser un entero',
            'asignatura_id.exists' => 'La asignatura no se encuentra registrada',
        ]);
    }
}
