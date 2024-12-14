<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/locales/es.js"></script>
</head>
<body>
<div style="margin-bottom: 20px;">
    <label for="courtFilter">Filtrar por pista:</label>
    <select id="courtFilter">
        <option value="">Todas</option>
        @foreach ($courts as $court)
            <option value="{{ $court->id }}">{{ $court->name }}</option>
        @endforeach
    </select>
</div>
    <div id="calendar"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: @json($events),
            eventClick: function (info) {
                if (confirm('¿Deseas editar esta reserva?')) {
                  window.location.href = `/reservations/${info.event.id}/edit`;
                 }
            },
        });

        calendar.render();

        // Filtro por pista
        document.getElementById('courtFilter').addEventListener('change', function () {
            var courtId = this.value;
            var filteredEvents = courtId
                ? @json($events).filter(event => event.extendedProps.court_id == courtId)
                : @json($events);

            calendar.removeAllEvents();
            calendar.addEventSource(filteredEvents);
        });
        
    </script>
</body>
</html>
