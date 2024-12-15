<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
     /**
     * Mostrar todas las reservas.
     */
    public function index()
    {
        $reservations = Reservation::with('user', 'court')->get();
        //dd($reservations); 
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Mostrar el formulario para crear una nueva reserva.
     */
    public function create(Request $request)
    {
       // $users = User::all(); // Usuarios disponibles
        $courts = Court::all();
        $selectedDate = $request->query('date', null); // Obtener la fecha desde la URL (si existe)
    

    // Generar intervalos de 30 minutos
        $timeSlots = [];
        $start = new \DateTime('08:00');
        $end = new \DateTime('21:00');

        while ($start <= $end) {
            $timeSlots[] = $start->format('H:i');
            $start->modify('+30 minutes');
        }

        return view('reservations.create', compact('courts', 'timeSlots','selectedDate'));
       // return view('reservations.create', compact('users', 'courts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            
            'court_id' => 'required|exists:courts,id',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
           'duration' => 'required|integer|in:60,90,120',
            
        ]);

            // Obtener el usuario logueado
            $userId = auth()->id();

            // Comprobar si ya existe una reserva con los mismos datos
            $existingReservation = Reservation::where('court_id', $request->input('court_id'))
                ->where('date', $request->input('date'))
                ->where('time', $request->input('time'))
                ->first();

            if ($existingReservation) {
                return redirect()->back()
                        ->withInput()
                        ->with('error', 'La hora seleccionada ya está reservada. Por favor, elige otra hora.');
            }

            // Crear la nueva reserva
            $reservation = new Reservation();
            $reservation->user_id = $userId;  // Asociar la reserva al usuario logueado
            $reservation->court_id = $request->input('court_id');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->duration = $request->input('duration');
            $reservation->status = 'pending'; // Reserva pendiente hasta que se confirme el pago
            $reservation->save();

            return redirect()->route('reservations.payment', ['id' => $reservation->id]); // Redirigir al pago
        

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
    public function edit( $id)
    {
        $reservation = Reservation::findOrFail($id);
        $users = User::all();
        $courts = Court::all();
        return view('reservations.edit', compact('reservation', 'users', 'courts'));
    }

    /**
     * Actualizar una reserva en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Obtener los datos de la reserva del formulario
        $courtId = $request->input('court_id');
        $date = $request->input('date');
        $time = $request->input('time');

        // Comprobar si ya existe una reserva con esos datos, pero asegurándose de que no sea la misma reserva
        $existingReservation = Reservation::where('court_id', $courtId)
            ->where('date', $date)
            ->where('time', $time)
            ->where('id', '<>', $id)  // No comprobar la propia reserva que estamos actualizando
            ->first();

        // Si existe una reserva, redirigir con mensaje de error
        if ($existingReservation) {
            return redirect()->back()->with('error', 'La hora seleccionada ya está reservada. Por favor, elige otro horario.');
        }

        // Si no existe, proceder a actualizar la reserva
        $reservation = Reservation::findOrFail($id);
        $reservation->court_id = $courtId;
        $reservation->date = $date;
        $reservation->time = $time;
        $reservation->duration = $request->input('duration');
        $reservation->status = $request->input('status'); 
        $reservation->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada con éxito.');
    
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada exitosamente.');
    }



    //Cuando la reserva esta en estado pendienting
    public function showPaymentPage($id)
    {
        $reservation = Reservation::findOrFail($id);
        
            // Determinar el precio basado en la duración
            $price = match ($reservation->duration) {
                60 => 20,
                90 => 30,
                120 => 40,
                default => 0,
            };

        return view('reservations.payment', compact('reservation', 'price'));
        }


        //Realizar el pago por la Reserva ya confirmada
        public function confirmPayment($id)
        {
            $reservation = Reservation::findOrFail($id);

            // Cambiar estado a "confirmed"
            $reservation->status = 'confirmed';
            $reservation->save();
        
            // Redirigir a la vista de confirmación
            return view('reservations.success', ['reservation' => $reservation]);
        }


        // Liberar reservas pasadas (se llamará desde un comando)
    public function releasePastReservations()
    {
        $now = Carbon::now();

        // Buscar reservas pasadas
        $pastReservations = Reservation::where('date', '<', $now->format('Y-m-d'))
            ->orWhere(function ($query) use ($now) {
                $query->where('date', $now->format('Y-m-d'))
                      ->where('time', '<', $now->format('H:i'));
            })
            ->get();

        // Eliminar las reservas
        foreach ($pastReservations as $reservation) {
            $reservation->delete();
        }

    }

}