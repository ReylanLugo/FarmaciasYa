<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Utils\ProfesorValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfesorController extends Controller
{
    public function getAll()
    {
        return Profesor::with("asignatura")->get();
    }

    public function getById($id)
    {
        try {
            $profesor = Profesor::with("asignatura")->findOrFail($id);
            return response()->json(['success' => true, 'profesor' => $profesor], 200);
        } catch (\Exception $e) {
            return response()->json(["success" => false, "message" => 'No se encuentra ningun profesor registrado con ese id', "error" => $e->getMessage()], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            ProfesorValidation::Create($request);
            $profesor = Profesor::create($request->all());
            return response()->json(['success' => true, 'message' => 'Profesor registrado con exito', 'profesor' => $profesor->id]);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo registrar el profesor', 'error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No pudo registrar el profesor'], 500);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            ProfesorValidation::Update($request);
            $profesor = Profesor::findOrFail($id);
            $profesor->update($request->all());
            return response()->json(['success' => true, 'message' => 'Profesor actualizado con exito', 'profesor' => $profesor->id], 200);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo actualizar el profesor', 'error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se encuentra ningun profesor registrado con ese id'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $profesor = Profesor::findOrFail($id);
            $profesor->delete();
            return response()->json(['success' => true, 'message' => 'Profesor eliminado con exito', 'profesor' => $id], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el profesor', 'error' => $e->getMessage()], 500);
        }
    }
}
