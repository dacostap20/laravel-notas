<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'id';

    public function estudianteCurso()
    {
        return $this->belongsTo('App\Models\CursosEstudiantes', 'id', 'idEstudiante');
    }
}
