@extends('layouts.admin')
@section('title', 'Bienvenida al panel de administración')

@section('main')
    <section class="adminIndex">
        <h1>Panel de administración</h1>
        <p>¡Bienvenido a nuestro panel de administración!</p>

        <div class="gestion">
            <div>
                <p>¿Querés comenzar a gestionar tus libros?</p>
                <a href="{{ route('admin.dashboard') }}" class="btn">¡Gestionar Libros!</a>
            </div>
            <div class="publicarNovedad">
                <p>¿Deseas publicar una nueva novedad?</p>
                <a href="{{ route('admin.dashboardNews') }}" class="btn">¡Gestionar Novedades!</a>
            </div>
        </div>

        <div class="estadisticas">
            <div>
                @if ($nombreLibroMasVendido)
                    <p><ion-icon name="analytics-outline"></ion-icon> El libro más vendido:
                        <span>{{ $nombreLibroMasVendido }}</span> </p>
                @else
                    <p>No hay libros vendidos todavía.</p>
                @endif
            </div>
            <div>
                <p> <ion-icon name="people-outline"></ion-icon>Total de usuarios: <span>{{ $totalUsuarios }}</span> </p>
            </div>
            <div>
                @if ($ultimoLibroCargado)
                    <p><ion-icon name="book-outline"></ion-icon>Último libro cargado:
                        <span>{{ $ultimoLibroCargado->title }}</span></p>
                    <p>Autor: <span>{{ $ultimoLibroCargado->author }}</span> </p>
                @else
                    <p>No hay libros cargados todavía.</p>
                @endif
            </div>
            <div>
                @if ($nombreMesConMasFacturacion)
                    <p><ion-icon name="wallet-outline"></ion-icon>Mes con más facturación:
                        <span>{{ $nombreMesConMasFacturacion }}</span> </p>
                @else
                    <p>No hay facturación registrada todavía.</p>
                @endif
            </div>
        </div>

    </section>
@endsection
