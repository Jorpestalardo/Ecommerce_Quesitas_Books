@extends('layouts.main')
@section('title', 'Mi Perfil')
@section('main')

    <section class="usuarios">
        <div class="introDash">
            <h1>¡Hola {{ $usuario->nombre }}!</h1>
            <p>Información personal:</p>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container">
                            <img class="rounded-circle" src="{{ url('storage/img/' . $usuario->img) }}"
                                alt="{{ $usuario->imgDescription }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="authorDate mt-4">
                            @if ($usuario->nombre && $usuario->apellido)
                                <p class="fs-5"><span>Nombre completo:</span> {{ $usuario->nombre }},
                                    {{ $usuario->apellido }}.</p>
                            @else
                                <p class="fs-5">No se ingresaste tu nombre y apellido.</p>
                            @endif
                            <p class="fs-5"><span>Email:</span> {{ $usuario->email }}</p>
                            @if ($usuario->biografia)
                                <p class="fs-5"><span>Biografía:</span> {{ $usuario->biografia }}</p>
                            @else
                                <p class="fs-5"><span>Biografía:</span> No se ingresaste tu biografía</p>
                            @endif
                            @if ($usuario->libroPreferido)
                                <p class="fs-5"><span>Libro Preferido:</span> {{ $usuario->libroPreferido }}</p>
                            @else
                                <p class="fs-5"><span>Libro Preferido:</span> No se ingresaste tu libro favorito</p>
                            @endif
                            <h2 class="comprasHechas pt-5">Compras hechas:</h2>
                            @if ($carritosCompletados->isEmpty())
                                <p>No se realizó ninguna compra.¿Deseas realizar una?</p>
                                <a href="{{ route('libros.index') }}"><ion-icon name="cart-outline"></ion-icon> Ir a comprar</a>
                            @else
                                @foreach ($carritosCompletados as $carrito)
                                    <div class="compra">
                                        <p><strong>Fecha de Compra:</strong> {{ $carrito->created_at }}</p>
                                        <p><strong>Total Gastado:</strong> ${{ $carrito->cartItems->sum('book.price') }}
                                        </p>                                        <ul>
                                            @foreach ($carrito->cartItems as $item)
                                                <li>{{ $item->book->title }} - Cantidad: {{ $item->quantity }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="d-grid gap-2 d-md-block mt-4">
                            <a class="btn btn-success"
                                href="{{ route('usuario.editarPerfil', ['id' => $usuario->user_id]) }}">Editar</a>
                            <a class="btn btn-secondary" href="{{ route('home') }}">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
