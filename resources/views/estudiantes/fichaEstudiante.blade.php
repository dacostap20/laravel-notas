@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> {{$estudiante->nombre}} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">estudiante</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h2>{{$estudiante->nombre}}</h2>
                        </div>
                        <hr>
                        <br>
                        <div class="d-flex justify-content-between">
                            <b>Identificacion:</b>
                            <p>{{$estudiante->documento}} </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Edad:</b>
                            <p>{{$estudiante->edad}} </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Curso:</b>
                            <p>{{$estudiante->estudianteCurso->informacionCurso->curso}}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <b>Grado:</b>
                            <p>{{$estudiante->estudianteCurso->informacionCurso->grado}}</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <b>Telefono Acudiente:</b>
                            <p>{{$estudiante->telefonoPadres}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <b>Promedio Actual:</b>
                            <p>{{isset($estudiante->promedio) ? $estudiante->promedio:'No hay notas' }} </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <button type="button" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#agregar" data-whatever="@mdo">Asignar Materia a estudiante </button>
                <br>
                <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Asignar Materia </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('materiaEstudiante')}}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field()!!}
                                    <input type="hidden" name="idEstudiante" value="{{$estudiante->id}}">
                                    <select name="idMateria" class="form-control">
                                        @foreach ($materias as $materia)
                                            <option value=" {{$materia->id}} ">{{$materia->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <button type="submit" value="enviar" class="btn btn-success" id="buttoAccion">Asignar</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Materia</th>
                                            <th>Promedio</th>
                                            <th>Agregar Nota</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materiasEstudiante as $materiaEstudiante)
                                            <tr>
                                                <td>{{$materiaEstudiante->informacionMateria->nombre}}</td>
                                                <td>{{isset($materiaEstudiante->promedioTotal)?$materiaEstudiante->promedioTotal:'No hay notas'}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" style="width: 100%" data-toggle="modal" data-target="#agregarnota{{$materiaEstudiante->id}}" data-whatever="@mdo">agregar nota </button>
                                                    <div class="modal fade" id="agregarnota{{$materiaEstudiante->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel">Nota Materia </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('calificarMateriaEstudiante')}}" method="post" enctype="multipart/form-data">
                                                                        {!! csrf_field()!!}
                                                                            <input type="hidden" name="idMateriaEstudiante" value="{{$materiaEstudiante->id}}">
                                                                            <input type="number" class="form-control" name="nota" placeholder="Ingrese Nota 0 a 10" min="0" max="10" step="0.01">
                                                                            <br>
                                                                            <input type="text" class="form-control" name="observacion" placeholder="Concepto">
                                                                        <br>
                                                                        <button type="submit" value="enviar" class="btn btn-success" id="buttoAccion">Calificar</button>
                                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success" style="width: 100%" data-toggle="modal" data-target="#verNotas{{$materiaEstudiante->id}}" data-whatever="@mdo">Ver notas </button>
                                                    <div class="modal fade" id="verNotas{{$materiaEstudiante->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"> Detalle </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Materia</th>
                                                                                <th>Nota</th>
                                                                                <th>Detalle</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($todasNotasMaterias as $todasNotasMateria)
                                                                                @if ($todasNotasMateria->idMateriaEstudiante == $materiaEstudiante->id)
                                                                                    <tr>
                                                                                        <td>{{$todasNotasMateria->infoMateriaEstudiante->informacionMateria->nombre}}</td>
                                                                                        <td> {{$todasNotasMateria->nota}} </td>
                                                                                        <td> {{$todasNotasMateria->observacion}} </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!----fin-->
        </div>
    </div>
    <br>
    <div class="row mt2">
        <div class="col-12">
            <div class="card">
                <h4 class="card-title">Detalle de calificaciones</h4>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Nota</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todasNotasMaterias as $todasNotasMateria)
                                <tr>
                                    <td>{{$todasNotasMateria->infoMateriaEstudiante->informacionMateria->nombre}}</td>
                                    <td> {{$todasNotasMateria->nota}} </td>
                                    <td> {{$todasNotasMateria->observacion}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
