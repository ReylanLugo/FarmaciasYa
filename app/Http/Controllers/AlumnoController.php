<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlumnoController extends Controller
{
    public function getAll()
    {
        return Alumno::all();
    }

    public function getById($id)
    {
        try {
            $alumno = Alumno::findOrFail($id);
            return response()->json(['success' => true, 'alumno' => $alumno], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'message' => 'No se encuentra ningun alumno registrado con ese id',
                'error' => $th->getMessage()
            ], 404);
        }
    }
    public function create(Request $request)
    {
        try {
            $newalumno = Alumno::create($request->all());
            return response()->json([ 'success' => true, 'message' => 'Alumno registrado con exito', 'alumno' => $newalumno->id]);
        } catch (ValidationException $e) {
            return response()->json(['success'=> false, 'message'=> 'No se pudo registrar el alumno','error'=> $e->errors()], 422);
        }
        catch (\Throwable $th) {
            return response()->json(['success'=> false,'message' => 'No se pudo registrar el alumno', 'error' => $th->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $alumno = Alumno::findOrFail($id);
            $alumno->update($request->all());
            return response()->json(['success' => true, 'message' => 'Alumno actualizado con exito', 'alumno' => $alumno->id]);
        } catch (ValidationException $e) {
            return response()->json(['success'=> false,'message'=> 'No se pudo actualizar el alumno','error'=> $e->errors()], 422);
        } catch (\Throwable $e) {
            return response()->json(['success'=> false,'message' => 'No se encuentra ningun alumno registrado con ese id', 'error' => $e->getMessage()], 404);
        }
    }

    public function destroy($id)
    {
        try {
            Alumno::findOrFail($id)->delete();
            return response()->json(['success' => true, 'message' => 'Alumno eliminado con exito', 'alumno' => $id]);
        } catch (\Throwable $e) {
            return response()->json(['success'=> false, 'message' => 'No se encuentra ningun alumno registrado con ese id', 'error' => $e->getMessage()], 404);
        }
    }
}
