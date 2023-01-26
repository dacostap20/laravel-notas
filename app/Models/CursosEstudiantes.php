<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosEstudiantes extends Model
{
    use HasFactory;
    protected $table = 'cursos_estudiantes';
    protected $primaryKey = 'id';

    public function informacionCurso()
    {
        return $this->belongsTo('App\Models\Cursos', 'idCurso');
    }
}
