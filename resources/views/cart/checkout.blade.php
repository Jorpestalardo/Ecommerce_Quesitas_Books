@extends('layouts.main')

@section('title', 'Finalizar compra')


<h1>Finalizar compra</h1>

@if ($cart)
    <table class="table">
        <thead>
            <tr>
                <th>Producto ID</th>
                <th>Título</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart->cartItems as $item)
                <tr>
                    <td>{{ $item->book_id }}</td>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->book->price }}</td>
                    <td>${{ $item->book->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total de la compra: ${{ $total }}</h3>

    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Confirmar compra</button>
    </form>
@else
    <p>El carrito está vacío.</p>
@endif
@endsection
