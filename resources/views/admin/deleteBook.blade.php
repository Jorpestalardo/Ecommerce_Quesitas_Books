@extends('layouts.admin')
@section('title', 'Confirmar eliminación de ' . $book->title)
@section('main')

    <section class="deleteBook">
        <h1>Confirmar eliminación de "{{ $book->title }}"</h1>

        <x-book-data :book='$book' />

        <form action="{{ route('admin.deleteAction', ['id' => $book->book_id]) }}" method="post">
            @csrf
            <p>¿Estás seguro que quieres eliminar '{{ $book->title }}'?</p>

            <div class="d-grid gap-2 d-md-block pb-5 pt-5">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a class="btn btn-secondary" href="{{ route('admin.dashboard') }}">Volver</a>
            </div>
        </form>
    </section>
@endsection
