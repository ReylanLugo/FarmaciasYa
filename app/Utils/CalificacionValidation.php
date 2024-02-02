<?php

namespace App\utils;

use Illuminate\Http\Request;


class CalificacionValidation
{

    public static function Create(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|integer|exists:alumnos,id',
            'asignatura_id' => 'required|integer|exists:asignaturas,id',
            'calificacion' => 'required|integer|between:0,20',
        ], [
            'alumno_id.required' => 'El campo alumno_id es obligatorio',
            'alumno_id.integer' => 'El campo alumno_id debe ser un número entero',
            'alumno_id.exists' => 'El campo alumno_id no existe en la base de datos',
            'asignatura_id.required' => 'El campo asignatura_id es obligatorio',
            'asignatura_id.integer' => 'El campo asignatura_id debe ser un número entero',
            'asignatura_id.exists' => 'El campo asignatura_id no existe en la base de datos',
            'calificacion.required' => 'La calificación es obligatoria',
            'calificacion.integer' => 'La calificación debe ser un número entero',
            'calificacion.between' => 'La calificación debe estar entre 0 y 20',
        ]);
    }

    public static function Update(Request $request)
    {
        $request->validate([
            'alumno_id' => 'integer|exists:alumnos,id',
            'asignatura_id' => 'integer|exists:asignaturas,id',
            'calificacion' => 'integer|between:0,20',
        ], [
            'alumno_id.integer' => 'El campo alumno_id debe ser un número entero',
            'alumno_id.exists' => 'El campo alumno_id no existe en la base de datos',
            'asignatura_id.integer' => 'El campo asignatura_id debe ser un número entero',
            'asignatura_id.exists' => 'El campo asignatura_id no existe en la base de datos',
            'calificacion.integer' => 'La calificación debe ser un número entero',
            'calificacion.between' => 'La calificación debe estar entre 0 y 20',
        ]);
    }
}
