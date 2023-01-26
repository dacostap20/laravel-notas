<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Http\Requests\StoreMateriasRequest;
use App\Http\Requests\UpdateMateriasRequest;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materias=Materias::all();
        return view('materias.verMaterias', compact('materias'));
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
     * @param  \App\Http\Requests\StoreMateriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show(Materias $materias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMateriasRequest  $request
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriasRequest $request, Materias $materias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materias)
    {
        //
    }
}
