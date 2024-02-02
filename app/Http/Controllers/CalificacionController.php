<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\utils\CalificacionValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CalificacionController extends Controller
{
    public function getAll()
    {
        return Calificacion::with("alumno", "asignatura")->get();
    }

    public function getById($id)
    {
        try {
            $calificacion = Calificacion::with("alumno", "asignatura")->findOrFail($id);
            return response()->json(['success' => true, 'message' => 'Calificación encontrada', 'calificacion' => $calificacion], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Calificación no encontrada'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            CalificacionValidation::Create($request);
            $calificacion = Calificacion::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Calificación registrada con exito',
                'calificacion' => $calificacion->id
            ], 200);
        } catch (ValidationException $ex) {
            return response()->json(['success' => false, 'message' => 'No se pudo registrar la calificación', 'error' => $ex->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            CalificacionValidation::Update($request);
            $calificacion = Calificacion::findOrFail($id);
            $calificacion->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Calificación actualizada con exito',
                'calificacion' => $calificacion->id
            ], 200);
        } catch (ValidationException $ex) {
            return response()->json(['success' => false, 'message' => 'No se pudo actualizar la calificación', 'error' => $ex->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $calificacion = Calificacion::findOrFail($id);
            $calificacion->delete();
            return response()->json([
                'success' => true,
                'message' => 'Calificación eliminada con exito',
                'calificacion' => $calificacion->id
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }
}
