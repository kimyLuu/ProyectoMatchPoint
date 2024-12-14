<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courts =Court::all();
        return view('courts.index', compact('courts'));
    }

    /**
     * Mostrar el formulario para crear una nueva pista
     */
    public function create()
    {
        //
        return view('courts.create');
    }

    /**
     * Guardar una nueva pista en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courts|max:255',
            'status' => 'required|in:available,occupied',
        ]);

        Court::create($request->all());
        return redirect()->route('courts.index')->with('success', 'Pista creada exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

 /**
     * Mostrar el formulario de edición para una pista.
     */
    public function edit(Court $court)
    {
        return view('courts.edit', compact('court'));
    }

    /**
     * Actualizar una pista en la base de datos.
     */
    public function update(Request $request, Court $court)
    {
        $request->validate([
            'name' => 'required|unique:courts,name,' . $court->id . '|max:255',
            'status' => 'required|in:available,occupied',
        ]);

        $court->update($request->all());
        return redirect()->route('courts.index')->with('success', 'Pista actualizada correctamente.');
    }

    /**
     * Eliminar una pista.
     */
    public function destroy($id)
    {
        // Encuentra la pista a eliminar
        $court = Court::findOrFail($id);

        // Elimina la pista
        $court->delete();

        // Redirige con mensaje de éxito
        return redirect()->route('courts.index')->with('success', 'Pista eliminada correctamente.');
    }
}