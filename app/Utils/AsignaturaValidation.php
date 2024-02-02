<?php

namespace App\Utils;

use Illuminate\Http\Request;

class AsignaturaValidation
{
    public static function Create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'string',
        ], [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.string' => 'El campo nombre debe ser de tipo texto',
            'nombre.max' => 'El campo nombre no debe ser mayor a 50 caracteres',
            'descripcion.string' => 'El campo descripción debe ser de tipo texto',
        ]);
    }

    public static function Update(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:50',
            'descripcion' => 'string',
        ], [
            'nombre.string' => 'El campo nombre debe ser de tipo texto',
            'nombre.max' => 'El campo nombre no debe ser mayor a 50 caracteres',
            'descripcion.string' => 'El campo descripción debe ser de tipo texto',
        ]);
    }
}
