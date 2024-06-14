<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Personas;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Personas::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Personas::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return Personas::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Personas::findOrFail($id);
        $data->update($request->all());

        return "Se actualizo correctamente el usuario.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Personas::findOrFail($id);
        $data->delete();
        return "Se borro correctamente el usuario.";
    }
}
