@extends('layouts.main')
@section('title', 'Detalle de ' . $new->title)
@section('main')
    <section class="secDetailNew">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-100 mt-3 rounded" src="{{ url('storage/img/' . $new->img) }}"
                        alt="{{ $new->imgDescription }}">
                    <div class="authorDate mt-3">
                        <p class="card-text">{{ $new->author }}</p>
                        <p class="card-text">{{ $new->publishDate }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="card-title">{{ $new->title }}</h2>
                    <p class="card-text">{{ $new->subtitle }}</p>
                    <p class="infoNew">{{ $new->info }}</p>
                    <p>¿Te interesó este artículo y quieres seguir leyendo? ¡Te invitamos a que hagas clic en el botón
                        blanco de abajo!</p>
                    <div class="d-grid gap-2 d-md-block mt-4">
                        <a class="btn" href="{{ $new->link }}" target="_blank" rel="noopener noreferrer">Quiero saber
                            más</a>
                        <a class="btn btn-secondary" href="{{ route('news.index') }}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
