@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Crear estudiantes </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Información</a></li>
                <li class="breadcrumb-item active" aria-current="page">General</li>
            </ol>
        </nav>
    </div>
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-description"> Agregue estudiante </p>
            <form class="form-sample" action="{{url('crear-estudiante')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field()!!}
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                </div>
                <div class="form-group">
                    <label for="">Identificación</label>
                    <input type="number" class="form-control" name="documento" placeholder="Numero de identificación">
                </div>
                <div class="form-group">
                    <label for="">Edad</label>
                    <input type="number" class="form-control" name="edad" placeholder="Ingrese años cumplidos">
                </div>
                <div class="form-group">
                    <label for="">Elija curso </label>
                    <select name="curso" class="form-control">
                        @foreach ($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->curso}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Telefono contacto</label>
                    <input type="text" class="form-control" name="telefono" placeholder="ingrese telefono">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-lg" style="width: 100%" type="submit">Crear Estudiante</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Estadiante</th>
                            <th>Documento</th>
                            <th>Fecha creacion</th>
                            <th>Curso</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{$estudiante->nombre}}</td>
                                <td>{{$estudiante->documento}}</td>
                                <td>{{$estudiante->created_at}}</td>
                                <td>{{$estudiante->estudianteCurso->informacionCurso->curso}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('fichaEstudiante', ['idEstudiante' => $estudiante->id]) }}"> Ver </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
