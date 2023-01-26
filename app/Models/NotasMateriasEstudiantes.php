<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasMateriasEstudiantes extends Model
{
    use HasFactory;
    protected $table = 'notas_materias_estudiantes';
    protected $primaryKey = 'id';

    public function infoMateriaEstudiante()
    {
        return $this->belongsTo('App\Models\MateriasEstudiantes', 'idMateriaEstudiante');
    }
}
