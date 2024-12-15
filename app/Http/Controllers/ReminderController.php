<?php

namespace App\Http\Controllers;

use App\Mail\ReservationReminderMail;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{
    public function sendReminders()
    {
        $now = Carbon::now();

        // Buscar reservas confirmadas que ocurrirán dentro de los próximos 15 minutos
        $upcomingReservations = Reservation::where('status', 'confirmed')
            ->where('date', $now->toDateString())
            ->where('time', '>=', $now->addMinutes(15)->format('H:i:s'))
            ->get();

        // Enviar correos a los usuarios
        foreach ($upcomingReservations as $reservation) {
            Mail::to($reservation->user->email)
                ->send(new ReservationReminderMail($reservation));
        }

        return response()->json(['message' => 'Recordatorios enviados correctamente']);
    }
}
