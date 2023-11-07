@extends('layouts.main')

@section('title', 'Detalle de ' . $book->title)

@section('main')
    <section class="detailBook">
        <h1>{{ $book->title }}</h1>
        <x-book-data :book='$book' />

        <a class="btn btn-secondary" href="{{ route('libros.index') }}">Volver</a>
    </section>

@endsection
