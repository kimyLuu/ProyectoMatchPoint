<!DOCTYPE html>
<html>
<head>
    <title>Recordatorio de Reserva</title>
</head>
<body>
    <h1>¡Hola, {{ $reservation->user->name }}!</h1>
    <p>Este es un recordatorio para tu próxima reserva:</p>
    <ul>
        <li><strong>Fecha:</strong> {{ $reservation->date }}</li>
        <li><strong>Hora:</strong> {{ $reservation->time }}</li>
        <li><strong>Pista:</strong> {{ $reservation->court->name }}</li>
        <li><strong>Duración:</strong> {{ $reservation->duration }} minutos</li>
    </ul>
    <p>¡Te esperamos en MatchPoint!</p>
</body>
</html>
