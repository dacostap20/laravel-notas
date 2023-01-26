<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriasEstudiantes extends Model
{
    use HasFactory;
    protected $table = 'materias_estudiantes';
    protected $primaryKey = 'id';

    public function informacionMateria()
    {
        return $this->belongsTo('App\Models\Materias', 'idMateria');
    }
}
