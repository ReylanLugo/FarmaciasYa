<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AsignaturaController extends Controller
{
    public function getAll()
    {
        return Asignatura::all();
    }

    public function getById($id)
    {
        try {
            $asinatura = Asignatura::findOrFail($id);
            return response()->json([
                'success' => true,
                'asignatura'=> $asinatura
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message' => 'No se encuentra ninguna asignatura registrado con ese id',
                'error' => $th->getMessage()
            ], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $asinatura = Asignatura::create($request->all());
            return response()->json([
                'success'=> true,
                'message' => 'Asignatura registrada con exito',
                'asignatura' => $asinatura->id,
            ], 200);
        } catch (ValidationException $ex) {
            return response()->json([
                'success'=> false,
                "message" => "Error de validación",
                "error" => $ex->errors()
            ], 422);
        } catch (\Throwable $th) {
            return response()->json([
                "success"=> false,
                'message' => 'No se pudo registrar la asignatura',
                'error' => $th->getMessage()
            ], 404);
        };
    }

    public function update(Request $request, $id)
    {
        try {
            $asinatura = Asignatura::findOrFail($id);
            $asinatura->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Asignatura actualizada con exito',
                'asignatura'=> $asinatura->id
            ], 200);
        } catch (ValidationException $ex) {
            return response()->json([
                'success'=> false,
                "message" => "Error de validación",
                "error" => $ex->errors()
            ], 422);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No se encuentra ninguna asignatura registrada con ese id',
                'error' => $th->getMessage()
            ], 404);
        };
    }

    public function destroy($id)
    {
        try {
            $asinatura = Asignatura::findOrFail($id);
            $asinatura->delete();
            return response()->json([
                'success' => true,
                'message' => 'Asignatura eliminada con exito',
                'asignatura'=> $asinatura->id
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message' => 'No se encuentra ninguna asignatura registrada con ese id',
                'error' => $th->getMessage()
            ], 404);
        };
    }
}
