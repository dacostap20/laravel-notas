<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Materias;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Materias::create(['nombre' => 'Matematicas basicas']);
        Materias::create(['nombre' => 'Algebra']);
        Materias::create(['nombre' => 'Trigonometria']);
        Materias::create(['nombre' => 'Calculo']);
        Materias::create(['nombre' => 'Fisica']);
        Materias::create(['nombre' => 'Ingles']);
        Materias::create(['nombre' => 'Español']);
        Materias::create(['nombre' => 'Arte']);
        Materias::create(['nombre' => 'Musica']);
        Materias::create(['nombre' => 'Programación']);
        Materias::create(['nombre' => 'Educación fisica']);
        Materias::create(['nombre' => 'Historia']);
    }
}
