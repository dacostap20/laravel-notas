@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Cursos </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cursos</li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Grado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{$curso->curso}}</td>
                                <td>{{$curso->grado}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
