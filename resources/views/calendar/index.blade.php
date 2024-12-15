@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{ __('Calendario de Reservas de Padel') }}</div>


                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>






@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        var initialLocaleCode = 'es';
        const calendarEl = document.getElementById('calendar');
        
        var eventsData = @json($events);

        const calendar = new FullCalendar.Calendar(calendarEl, {
          
            initialView: 'dayGridMonth', 
                slotDuration: '00:30:00', // Intervalos de 30 minutos
                slotMinTime: '08:00:00', // Hora mínima (8:00 AM)
                slotMaxTime: '21:00:00', // Hora máxima (9:00 PM)
            headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                businessHours: true,
                businessHours: [ 
                    {
                        daysOfWeek: [ 1, 2, 3, 4, 5 ], // Lunes a Viernes
                        startTime: '08:00', 
                        endTime: '21:00' 
                    }
                ],

           locale: initialLocaleCode, // Configura el idioma en español
                events: eventsData, // Pasa los eventos desde el servidor
                dateClick: function(info) {
                    // Redirige al formulario de creación con la fecha seleccionada
                 window.location.href = `/reservations/create?date=${info.dateStr}`;
                },          
                eventClick: function(info) {
                    // Redirige a la página de edición de la reserva
                    if (info.event.extendedProps.reservation_id) {
                        window.location.href = `/reservations/${info.event.extendedProps.reservation_id}/edit`;
                    }
                },
                
                eventColor: 'blue', // Color para los eventos
                eventTextColor: 'white', // Color de texto de los eventos         
                allDaySlot: false, // Desactivar la opción de todo el día
                events: eventsData // Eventos cargados desde el backend
            });
          

        calendar.render();
    });
</script>

@endpush
@endsection

