@extends('layouts.admin')
@section('title', 'Detalle de Usuario')
@section('main')

    <section class="usuarios">
        <div class="introDash">
            <h1>Usuario {{ $usuario->email }}</h1>
            <p>Información personal:</p>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p class="mt-3">Imagen actual</p>
                            @if ($usuario->img !== null && Storage::has('img/' . $usuario->img))
                                <div class="image-container">
                                    <img class="rounded-circle" src="{{ url('storage/img/' . $usuario->img) }}"
                                        alt="{{ $usuario->imgDescription }}">
                                </div>
                            @else
                                <ion-icon name="image-outline"></ion-icon>
                            @endif
                        </div>
                        <div class="authorDate mt-3">
                            <p class="card-text fs-5"><span>Nombre:</span> {{ $usuario->nombre }}</p>
                            <p class="card-text fs-5"><span>Apellido:</span> {{ $usuario->apellido }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 infoPerfil">
                        <p class="card-text fs-5"><span>Biografía:</span> {{ $usuario->biografia }}</p>
                        <p class="card-text fs-5"><span>Libro Preferido:</span> {{ $usuario->libroPreferido }}</p>
                        <div class="d-grid gap-2 d-md-block mt-4">
                            <a class="btn btn-secondary" href="{{ route('admin.usuarios.listaUsuarios') }}">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
        @endsection
