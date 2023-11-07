@extends('layouts.main')

@section('title', 'Pago Fallido')

@section('main')
    <section class="pagoFailure">
        <div>
            <ion-icon name="close-outline"></ion-icon>
        </div>
        <h1 class="text-center">¡Pago fallido!</h1>
        <p class="text-center">Falló su pago. Por favor inténtelo de nuevo. Puede volver a ver los productos de nuestro
            catálogo</p>
        <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">Volver</a>
    </section>

@endsection
