<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
     /**
     * Mostrar todas las reservas.
     */
    public function index()
    {
        $reservations = Reservation::with('user', 'court')->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Mostrar el formulario para crear una nueva reserva.
     */
    public function create()
    {
        $users = User::all(); // Usuarios disponibles
        $courts = Court::all(); // Pistas disponibles
        return view('reservations.create', compact('users', 'courts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'court_id' => 'required|exists:courts,id',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
           'duration' => 'required|integer|in:60,90,120',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostrar el formulario de edición para una reserva.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::all();
        $courts = Court::all();
        return view('reservations.edit', compact('reservation', 'users', 'courts'));
    }

    /**
     * Actualizar una reserva en la base de datos.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'court_id' => 'required|exists:courts,id',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer|in:60,90,120',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}