<?php

namespace App\Http\Controllers;

use App\Models\CursosEstudiantes;
use App\Http\Requests\StoreCursosEstudiantesRequest;
use App\Http\Requests\UpdateCursosEstudiantesRequest;

class CursosEstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCursosEstudiantesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursosEstudiantesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CursosEstudiantes  $cursosEstudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(CursosEstudiantes $cursosEstudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CursosEstudiantes  $cursosEstudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(CursosEstudiantes $cursosEstudiantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCursosEstudiantesRequest  $request
     * @param  \App\Models\CursosEstudiantes  $cursosEstudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCursosEstudiantesRequest $request, CursosEstudiantes $cursosEstudiantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CursosEstudiantes  $cursosEstudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(CursosEstudiantes $cursosEstudiantes)
    {
        //
    }
}
