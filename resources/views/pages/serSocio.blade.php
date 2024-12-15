@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center text-primary mb-4" style="font-size: 3rem; font-weight: bold;">Ser Socio</h1>
    <p class="text-center fs-4 mb-5">¡Descubre todas las ventajas de ser socio en Pádel Zaragoza!</p>
    
    <div class="mb-5">
        <ul class="list-unstyled fs-5">
            <li><strong>PRECIOS ESPECIALES:</strong> Descuentos exclusivos y tarifas especiales en nuestros patrocinadores.</li>
            <li><strong>RESERVAS CON ANTICIPACIÓN:</strong> Con 7 días de antelación o incluso pista fija.</li>
            <li><strong>RESERVAS POR TELÉFONO:</strong> Más flexibilidad para organizar tus partidos.</li>
            <li><strong>EQUIPOS DE PÁDEL ZARAGOZA:</strong></li>
            <ul class="list-unstyled ms-4">
                <li>Alquiler de pistas</li>
                <li>Venta de material</li>
                <li>14 pistas (mayor club de Aragón)</li>
                <li>Clases, torneos y entrenamientos de equipos</li>
                <li>Quedadas</li>
            </ul>
        </ul>
    </div>

    <h2 class="text-center text-secondary mb-4" style="font-size: 2rem;">Cuotas para Socios</h2>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Descuento</th>
                    <th>Precio</th>
                    <th>Promoción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Individual</td>
                    <td>72€</td>
                    <td>230€</td>
                    <td>2 meses gratis</td>
                </tr>
                <tr>
                    <td>Cónyuge</td>
                    <td>20% (57,60€)</td>
                    <td>207€</td>
                    <td>3 meses gratis</td>
                </tr>
                <tr>
                    <td>1er Hijo/a</td>
                    <td>30% (50,40€)</td>
                    <td>161€</td>
                    <td>5 meses gratis</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="alert alert-info mt-4 text-center">
        <strong>¡25% EN CUOTA DE SOCIO DE PÁDEL ZARAGOZA!</strong><br>
        Renueva o hazte socio por un año y aprovecha este descuento.<br>
        <em>*Oferta válida del 1/9/24 al 31/10/24 para altas (no socios) y renovaciones (socios) en tarifa anual.</em>
    </div>

    <div class="d-flex justify-content-center align-items-center mt-5" style="gap: 20px;">
        
        <img src="{{ asset('img/family.jpg') }}" alt="Socios Familiares" class="img-fluid rounded shadow" style="max-width: 60%; height: auto;">
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 900px; /* Ancho limitado para centrar todo */
        margin: auto;
        padding: 20px;
    }

    h1 {
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    h2 {
        color: #34495e;
    }

    p, ul {
        color: #2c3e50;
        line-height: 1.6;
    }

    table {
        background-color: #ffffff;
        border: 1px solid #ddd;
        margin-top: 20px;
    }

    table th, table td {
        padding: 15px;
        vertical-align: middle;
    }

    .table-dark {
        background-color: #34495e;
        color: #fff;
    }

    .alert-info {
        background-color: #d9edf7;
        color: #31708f;
        font-size: 1.1rem;
    }

    img {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    img:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    }

    .d-flex img {
        margin: 0 10px;
    }
</style>
