<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    //Se debe de definir el nombre de la tabla ya que el nombre es en español
    protected $table = 'calificaciones';

    protected $fillable = [
        'alumno_id',
        'asignatura_id',
        'calificacion',
    ];

    public function alumno() {
        return $this->belongsTo('App\Models\Alumno', 'alumno_id');
    }

    public function asignatura() {
        return $this->belongsTo('App\Models\Asignatura','asignatura_id');
    }
}
