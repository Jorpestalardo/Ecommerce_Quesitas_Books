@extends('layouts.admin')
@section('title', 'Listado de Usuarios')
@section('main')

    <section class="usuarios">
        <div class="introDash">
            <h1>Usuarios:</h1>
            <p>Acá podrás encontrar el listado de todos tus usuarios, podrás ver el detalle de los mismos y si desean
                publicar un libro.</p>
            <p>¡Qué gran comunidad!</p>
        </div>

        <div class="container usuarios">
            <div class="row">
                @foreach ($usuarios as $usuario)
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card carta">
                            <div class="card-body">
                                <h2 class="card-title">{{ $usuario->email }}</h2>
                                <p class="card-text">{{ $usuario->nombre }} {{ $usuario->apellido }}</p>
                                <a href="{{ route('admin.usuarios.usuarioDetalle', ['id' => $usuario->user_id]) }}"
                                    class="btn detalleUsuario">Detalle</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
