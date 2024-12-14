<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $reservations = Reservation::with('court')->get();
        $courts = Court::all(); // Obtener todas las pistas
        $events =$reservations->map(function($reservation){
            return [
                'title'=> $reservation->court->name,
                'start'=> $reservation->date.'T'.$reservation->time,
                'end' => date('Y-m-d\TH:i:s', strtotime($reservation->date . 'T' . $reservation->time . '+' . $reservation->duration . ' minutes')),
                'color' => $reservation->status === 'confirmed' ? 'green' : 'orange',
                'extendedProps' => [
                'court_id' => $reservation->court_id,
            ],
            ];
        }); 
        return view('calendar.index', [
            'events' => json_encode($events, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT),
            'courts' => $courts,
        ]);
        dd($events);

    }

    
}


