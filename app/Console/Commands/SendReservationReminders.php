<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Mail\ReservationReminderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendReservationReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía recordatorios para reservas próximas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Obtenemos las reservas próximas a enviar recordatorio
        $upcomingReservations = Reservation::where('status', 'confirmed')
            ->where('date', Carbon::now()->toDateString())
            ->where('time', '>=', Carbon::now()->addMinutes(15)->format('H:i:s'))
            ->get();

        // Verificamos si hay reservas pendientes
        if ($upcomingReservations->isEmpty()) {
            $this->info('No hay recordatorios pendientes para enviar.');
            return;
        }

        foreach ($upcomingReservations as $reservation) {
            try {
                // Enviar correo a cada usuario con una reserva confirmada
                Mail::to($reservation->user->email)
                    ->send(new ReservationReminderMail($reservation));

                $this->info('Recordatorio enviado a: ' . $reservation->user->email);
            } catch (\Exception $e) {
                // Captura cualquier error durante el envío
                $this->error('Error al enviar recordatorio a: ' . $reservation->user->email);
                $this->error('Mensaje de error: ' . $e->getMessage());
            }
        }

        $this->info('Proceso de envío de recordatorios completado.');
    }
}
