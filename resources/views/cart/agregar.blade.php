@extends('layouts.main')
@section('title', 'Bienvenidos')
@section('main')
    <h1>Agregar al carrito</h1>

    <form action="{{ route('carrito.agregar') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="book_id" value="{{ $book->book_id }}">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="1" min="1">
        <input type="hidden" name="price" value="{{ $book->price }}">
        <button type="submit">Agregar al carrito</button>
    </form>
@endsection
