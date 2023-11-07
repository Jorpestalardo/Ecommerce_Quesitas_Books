<div class="book">
    <x-book-img :book="$book" />
    <div class="infoBook">
        <div class="autorDate">
            <p>{{ $book->author }} <span>(Autor)</span> </p>
            <p>{{ $book->publishDate }} <span>(Fecha de publicación)</span></p>
        </div>
        <p>{{ $book->synopsis }}</p>

        <div class="infoExtra">
            <div>
                <h3>Páginas</h3>
                <p>{{ $book->pages }}</p>
            </div>
            <div>
                <h3>Lenguaje</h3>
                <p>{{ $book->language }}</p>
            </div>
            <div>
                <h3>Editorial</h3>
                <p>{{ $book->editorial }}</p>
            </div>
        </div>
        <p class="precio">${{ $book->price }}</p>
        @auth
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                <input type="number" name="quantity" value="1" min="1" class="quantity">
                <button type="submit" class="btn">Comprar</button>
            </form>
        @endauth
    </div>


</div>
