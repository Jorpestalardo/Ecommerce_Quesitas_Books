<x-book-img :book="$book" />

<p>{{ $book->publishDate }}</p>
<p>{{ $book->synopsis }}</p>
<p>{{ $book->pages }}</p>
<p>{{ $book->language }}</p>
<p>{{ $book->editorial }}</p>
<p>{{ $book->author }}</p>
<p>${{ $book->price }}</p>

<a class="btn btn-secondary" href="{{ route('libros.index') }}">Volver</a>
