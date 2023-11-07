@extends('layouts.main')

@section('title', 'Carrito')

@section('main')
    <section class="carrito container">
        <h1 class="mb-5">Tu carrito de compra</h1>
        <a href="{{ route('libros.index') }}">
            <ion-icon name="arrow-back-outline"></ion-icon> Seguir comprando
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($cart && $cart->cartItems->count() > 0)
            <div class="row row-cols-1">
                @foreach ($cart->cartItems as $item)
                    <ul class="col">
                        <li>
                            <div class="card rounded m-2">
                                <img src="{{ url('storage/img/' . $item->book->img) }}" class="img-fluid"
                                    alt="{{ $item->book->imgDescription }}">
                                <div class="card-body">
                                    <form action="{{ route('cart.remove', ['cartItemId' => $item->cart_items_id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">
                                            <ion-icon name="close-circle-outline"></ion-icon>
                                        </button>
                                    </form>

                                    <h2>{{ $item->book->title }}</h2>
                                    <p class="idLibro"> <span>ID de libro:</span> {{ $item->book_id }}</p>
                                    <div class="infoProduct ">
                                        <p> <span>Cantidad:</span> {{ $item->quantity }}</p>
                                        <p> $ {{ $item->book->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach

                <ul class="col">
                    <li>
                        <div class="card rounded m-2 result">
                            <div class="card-body">
                                <div class="cuenta">
                                    @php
                                        $total = 0;
                                        foreach ($cart->cartItems as $item) {
                                            $total += $item->book->price * $item->quantity;
                                        }
                                    @endphp
                                    <p> <span>Subtotal:</span> ${{ $total }}</p>
                                    <p> <span>Total:</span> ${{ $payment->getTotal() }}</p>
                                </div>
                                <div id="mp-bricks"></div>
                                <form action="{{ route('cart.clear') }}" method="POST"
                                    onsubmit="updatePreferenceBeforeClear()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <ion-icon name="trash-outline"></ion-icon> Vaciar carrito
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <form action="{{ route('cart.updatePreference') }}" method="POST" id="updatePreferenceForm"
                style="display: none;">
                @csrf
                @method('PUT')
            </form>
        @else
            <div class="cart-empty">
                <p>Tu carrito está vacío.</p>
                <p>Podés seguir viendo nuestro catálogo y agregar productos a tu carrito</p>
                <a href="{{ route('libros.index') }}" class="btn btn-outline-success">Volver al catálogo</a>
            </div>
        @endif
    </section>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('<?= $payment->getPublicKey() ?>');
        const bricksBuilder = mp.bricks();
        bricksBuilder.create('wallet', 'mp-bricks', {
            initialization: {
                preferenceId: '<?= $cart ? $payment->getPreferenceId() : '' ?>'
            }
        });

        function updatePreferenceBeforeClear() {
            // Envía una solicitud PUT para actualizar la preferencia antes de vaciar el carrito
            fetch('{{ route('cart.updatePreference') }}', {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(function() {
                // Una vez que se actualiza la preferencia, envía el formulario para vaciar el carrito
                document.getElementById('updatePreferenceForm').submit();
            });

            // Evita que el formulario se envíe de forma directa
            return false;
        }
    </script>
@endsection
