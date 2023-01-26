<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cursos;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cursos::create(['curso' => '601', 'grado' => 6]);
        Cursos::create(['curso' => '602', 'grado' => 6]);
        Cursos::create(['curso' => '701', 'grado' => 7]);
        Cursos::create(['curso' => '702', 'grado' => 7]);
        Cursos::create(['curso' => '801', 'grado' => 8]);
        Cursos::create(['curso' => '802', 'grado' => 8]);
        Cursos::create(['curso' => '901', 'grado' => 9]);
        Cursos::create(['curso' => '902', 'grado' => 9]);
        Cursos::create(['curso' => '1001', 'grado' => 10]);
        Cursos::create(['curso' => '1002', 'grado' => 10]);
        Cursos::create(['curso' => '1101', 'grado' => 11]);
        Cursos::create(['curso' => '1102', 'grado' => 11]);
    }
}
