<?php
// SDK de Mercado Pago
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

// Agrega credenciales
MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
$client = new PreferenceClient();
$libro = $libro;

// Verifica si el precio es mayor que cero antes de crear la preferencia de pago
if ($libro->price > 0) {
    $preference = $client->create([
        "items" => [
            [
                "title" => $libro->name,
                "quantity" => 1,
                "unit_price" => $libro->price,
            ]
        ]
    ]);
} else {
    $preference = null; // Establece $preference como null cuando el precio es cero
}
?>

@extends('layouts.headerPrincipal')
@section('title', 'MUNDO LIBRO | Ver libro' )
@section('style')
    <link rel="stylesheet" href="{{asset('/css/verLibro.css')}}">
@endsection

@section('content')
    <div class="main-container">
        <div class="second-container">
            <img src="{{ $libro->image }}" alt="{{ $libro->name }}">
            <div class="info-container">
                <h1>{{ $libro->name }}</h1>
                <h3 class="autor">{{ $libro->author }}</h3>
                <p>{{ $libro->publication_year }} - {{ $libro->genre }}</p>
                <p>{{ $libro->synopsis }}</p>
                @auth
                    @if ($libro->price > 0)
                        <div id="wallet_container"></div>
                    @else
                    <a href="{{ route('libros.descargados', $libro->id) }}" download="{{ rawurlencode($libro->name) }}.pdf" target="_blank" rel="noopener noreferrer" class="download-link">Descargar</a>
                    @endif
                @else
                    @if ($libro->price > 0)
                        <p class="message">Inicia sesión o registrate para comprar este libro.</p>
                    @else
                        <p class="message">Inicia sesión o registrate para descargar este libro.</p>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    @if ($preference)
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            const mp = new MercadoPago("{{config('services.mercadopago.key')}}");
            const bricksBuilder = mp.bricks();
            mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: "{{ $preference->id }}",
                },
                customization: {
                    texts: {
                        valueProp: 'smart_option',
                    },
                },
            });
        </script>
    @endif
@endsection