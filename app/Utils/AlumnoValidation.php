<?php

namespace App\Utils;

use Illuminate\Http\Request;

class AlumnoValidation
{
    public static function Create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'cedula' => 'required|string|max:10|unique:alumnos',
            'nacimiento' => 'required|date',
            'edad' => 'required|integer|min:18|max:120',
        ], [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre no puede tener mas de 50 caracteres',
            'nombre.string' => 'El nombre debe ser un texto',
            'apellido.required' => 'El apellido es requerido',
            'apellido.max' => 'El apellido no puede tener mas de 50 caracteres',
            'apellido.string' => 'El apellido debe ser un texto',
            'cedula.required' => 'La cedula es requerida',
            'cedula.string' => 'La cedula debe ser un texto',
            'cedula.max' => 'La cedula no puede tener mas de 10 caracteres',
            'cedula.unique' => 'Ya existe un alumno registrado con esa cedula',
            'nacimiento.required' => 'La fecha de nacimiento es requerida',
            'nacimiento.date' => 'La fecha de nacimiento debe ser una fecha',
            'edad.required' => 'La edad es requerida',
            'edad.integer' => 'La edad debe ser un numero',
            'edad.min' => 'La edad debe ser mayor o igual a 18',
            'edad.max' => 'La edad debe ser menor o igual a 120',
        ]);
    }
    public static function Update(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'string|max:50',
                'apellido' => 'string|max:50',
                'cedula' => 'string|max:10|unique:alumnos,cedula',
                'nacimiento' => 'date',
                'edad' => 'integer|min:18|max:120',
            ],
            [
                'nombre.string' => 'El nombre debe ser un texto',
                'nombre.max' => 'El nombre no puede tener mas de 50 caracteres',
                'cedula.string' => 'La cedula debe ser un texto',
                'cedula.max' => 'La cedula no puede tener mas de 10 caracteres',
                'cedula.unique' => 'Ya existe un alumno registrado con esa cedula',
                'nacimiento.date' => 'La fecha de nacimiento debe ser una fecha',
                'edad.integer' => 'La edad debe ser un numero',
                'edad.min' => 'La edad debe ser mayor o igual a 18',
                'edad.max' => 'La edad debe ser menor o igual a 120',
            ]
        );
    }
}
