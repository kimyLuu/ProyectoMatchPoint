<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        // Obtener todas las reservas y sus relaciones con las canchas
        $reservations = Reservation::with('court')->get();
         // Obtener todas las canchas (opcional si necesitas mostrarlas en otro lugar)
        $courts = Court::all();

        // Mapear las reservas a eventos para el calendario
        $events = $reservations->map(function ($reservation) {
            return [
               'title' => $reservation->court->name, // Título con el nombre de la cancha
                'start' => $reservation->date . 'T' . $reservation->time, // Fecha y hora de inicio
                'end' => date('Y-m-d\TH:i:s', strtotime($reservation->date . 'T' . $reservation->time . '+' . $reservation->duration . ' minutes')), // Calcular la hora de fin basándonos en la duración
                'color' => $reservation->status === 'confirmed' ? 'green' : 'orange', // Color según el estado de la reserva
                'extendedProps' => [
                    'reservation_id' => $reservation->id, // ID de la reserva
                    'court_id' => $reservation->court_id, // ID de la cancha
                ],
            ];
        });

       // Retornar la vista con los eventos y las canchas
       return view('calendar.index', [
        'events' => json_encode($events, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT), // Pasamos los eventos al frontend
        'courts' => $courts, // En caso de necesitar las canchas
    ]);
    }
}
