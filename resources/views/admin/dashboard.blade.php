<?php
use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.admin')
@section('title', 'Panel de administración')
@section('main')

    <section class="dashboard">
        <div class="introDash">
            <h1>Aquí encontrarás tus libros</h1>
            <p>Podrás crear, eliminar e incluso editar tus libros favoritos</p>
            <p>¡Espero que lo disfrutes!</p>
        </div>

        <a href="{{ route('admin.formNew') }}" class="btn">Publicar un libro</a>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Géneros</th>
                        <th scope="col">Sinopsis</th>
                        <th scope="col">Páginas</th>
                        <th scope="col">Lenguaje</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Fecha de publicación</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->book_id }}</td>
                            <td>
                                <x-book-img :book="$book" />
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach ($book->genres as $genre)
                                    <span class="badge bg-info text-dark">{{ $genre->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $book->synopsis }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->language }}</td>
                            <td>{{ $book->editorial }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publishDate }}</td>
                            <td>${{ $book->price }}</td>
                            <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.editBook', ['id' => $book->book_id]) }}" class="btn">Editar</a>
                                <a href="{{ route('admin.deleteBook', ['id' => $book->book_id]) }}"
                                    class="btn">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
