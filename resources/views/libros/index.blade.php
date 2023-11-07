@extends('layouts.main')
@section('title', 'Los 5 mejores libros infantiles')
@section('main')
    <section class="secBooks">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1>Los mejores libros infantiles</h1>

        <div class="container">
        <p>Descubre nuestra amplia selección de libros infantiles en línea. Desde cuentos clásicos hasta emocionantes aventuras, tenemos libros para todas las edades. Fomenta la imaginación y el amor por la lectura en tus hijos con nuestra colección segura y variada.</p>
            <div class="row">
                @foreach ($books as $book)
                    <ul class="col-md-12 col-sm-1 col-xl-6 ">
                        <li>
                            <div class="card rounded m-2">
                                <img class="w-100" src="{{ url('storage/img/' . $book->img) }}"
                                    alt="{{ $book->imgDescription }}">
                                <div class="card-body">
                                    <p class="card-text">Géneros: @foreach ($book->genres as $genre)
                                            <span class="badge bg-info text-dark">{{ $genre->name }}</span>
                                        @endforeach
                                    </p>
                                    <div class="titleDate">
                                        <h2 class="card-title">{{ $book->title }}</h2>
                                        <p class="card-text">{{ $book->publishDate }}</p>
                                    </div>
                                    <p class="card-text precio">${{ $book->price }}</p>
                                    <a href="{{ route('libros.detalle', ['id' => $book->book_id]) }}"
                                        class="btn btn-hover">Ver Detalle</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </section>
@endsection
