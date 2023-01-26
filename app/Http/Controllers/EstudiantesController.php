<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Estudiantes;
use App\Http\Requests\StoreEstudiantesRequest;
use App\Http\Requests\UpdateEstudiantesRequest;

use App\Models\Cursos;
use App\Models\Materias;
use App\Models\CursosEstudiantes;
use App\Models\MateriasEstudiantes;
use App\Models\NotasMateriasEstudiantes;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensaje='Colegio Prueba Laravel';
        $graficaMejoresEstudiantes=Estudiantes::select('documento')
            ->groupBy('documento')
            ->select(
                DB::raw(
                            '
                            documento as documento,
                            SUM(promedio) as promedio
                            '
                        )
                    )
            ->orderby('promedio', 'desc')
            ->take(10)
            ->get();
        $graficaPeoresEstudiantes=Estudiantes::select('documento')
            ->groupBy('documento')
            ->select(
                DB::raw(
                            '
                            documento as documento,
                            SUM(promedio) as promedio
                            '
                        )
                    )
            ->orderby('promedio', 'asc')
            ->take(10)
            ->get();
        $conteoEstudiantes=Estudiantes::count();
        $conteoMaterias=Materias::count();
        $conteoCursos=Cursos::count();
        return view('principal.principal', compact('mensaje','graficaMejoresEstudiantes','graficaPeoresEstudiantes','conteoEstudiantes', 'conteoMaterias','conteoCursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaCrearEstudiantes()
    {
        //
        $estudiantes=Estudiantes::all();
        $cursos=Cursos::all();
        return view('estudiantes.crearEstudiante', compact('estudiantes','cursos'));

    }
    public function crearEstudiantes(Request $request)
    {
        //
        $nombre=$request->input('nombre');
        $documento=$request->input('documento');
        $edad=$request->input('edad');
        $telefono=$request->input('telefono');
        $curso=$request->input('curso');

        $nuevoEstudiante = new Estudiantes();
        $nuevoEstudiante->nombre=$nombre;
        $nuevoEstudiante->edad=$edad;
        $nuevoEstudiante->documento=$documento;
        $nuevoEstudiante->telefonoPadres=$telefono;
        $nuevoEstudiante->save();

        $nuevoCursoEstudiante = new CursosEstudiantes();
        $nuevoCursoEstudiante->idCurso=$curso;
        $nuevoCursoEstudiante->idEstudiante=$nuevoEstudiante->id;
        $nuevoCursoEstudiante->save();
        return redirect()->route('vistaCrearEstudiantes')->with(array());
    }
    public function informacionEstudiante($idEstudiante = null){
        $estudiante = Estudiantes::find($idEstudiante);
        $materias = Materias::all();
        $materiasEstudiante = MateriasEstudiantes::where('idEstudiante',$idEstudiante)->get();
        $idMateriasEstudiante = MateriasEstudiantes::where('idEstudiante',$idEstudiante)->pluck('id');
        $todasNotasMaterias = NotasMateriasEstudiantes::wherein('idMateriaEstudiante',$idMateriasEstudiante)->get();
        return view('estudiantes.fichaEstudiante', compact('estudiante','materias','materiasEstudiante','todasNotasMaterias'));
    }
    public function asignarMateriaEstudiante(Request $request){
        $idEstudiante=$request->input('idEstudiante');
        $idMateria=$request->input('idMateria');
        $validarExiste = MateriasEstudiantes::where('idEstudiante',$idEstudiante)->where('idMateria',$idMateria)->first();
        if(isset($validarExiste)){
            //ya existe
        }else{
            $nuevaMateria = new MateriasEstudiantes();
            $nuevaMateria->idEstudiante=$idEstudiante;
            $nuevaMateria->idMateria=$idMateria;
            $nuevaMateria->save();
        }
        return redirect()->route('fichaEstudiante', ['idEstudiante' => $idEstudiante]);
    }
    public function notaMateriaEstudiante(Request $request){
        $idMateriaEstudiante=$request->input('idMateriaEstudiante');
        $nota=$request->input('nota');
        $observacion=$request->input('observacion');

        $nuevaNota = new NotasMateriasEstudiantes();
        $nuevaNota->idMateriaEstudiante=$idMateriaEstudiante;
        $nuevaNota->nota=$nota;
        $nuevaNota->observacion=$observacion;
        $nuevaNota->save();

        $materiaEstudiante=MateriasEstudiantes::find($idMateriaEstudiante);


        $conteoNotasMateria = NotasMateriasEstudiantes::where('idMateriaEstudiante',$idMateriaEstudiante)->count();
        $sumaTotalMateria = NotasMateriasEstudiantes::where('idMateriaEstudiante',$idMateriaEstudiante)->sum('nota');
        $totalNotaMateria=$conteoNotasMateria*10;
        //$notasEstudiante=$conteoNotas*$sumaTotal;
        $promedioTotalMateria=($sumaTotalMateria*100)/$totalNotaMateria;

        $materiaEstudiante->promedioTotal=$promedioTotalMateria;
        $materiaEstudiante->save();

        $conteoNotas = MateriasEstudiantes::where('idEstudiante',$materiaEstudiante->idEstudiante)->count();
        $sumaTotal = MateriasEstudiantes::where('idEstudiante',$materiaEstudiante->idEstudiante)->sum('promedioTotal');
        $totalNota=$conteoNotas*100;
        //$notasEstudiante=$conteoNotas*$sumaTotal;
        $promedioTotal=($sumaTotal*100)/$totalNota;

        $estudiante=Estudiantes::find($materiaEstudiante->idEstudiante);
        $estudiante->promedio=$promedioTotal;
        $estudiante->save();
        return redirect()->route('fichaEstudiante', ['idEstudiante' => $materiaEstudiante->idEstudiante]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudiantesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstudiantesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudiantesRequest  $request
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudiantesRequest $request, Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiantes $estudiantes)
    {
        //
    }
}
