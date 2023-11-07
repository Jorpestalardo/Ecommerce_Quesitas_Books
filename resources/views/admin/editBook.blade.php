@extends('layouts.admin')

@section('title', 'Editar: ' . $book->title)

@section('main')

    <section class="editBook">
        <h1>Editar "{{ $book->title }}"</h1>

        <form action="{{ route('admin.editAction', ['id' => $book->book_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}"
                    @if ($errors->has('title')) aria-describedby="error-title" @endif>
                @error('title')
                    <div class="text-danger" id="error-title">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div>
                <label for="genre_id">Géneros:</label>
                @foreach ($genres as $genre)
                    <div class="form-switch">
                        <label class="form-check-label m-2">
                            <input type="checkbox" name="genre_id[]" id="genre_id" class="form-check-input"
                                value="{{ $genre->genre_id }}" @checked(in_array($genre->genre_id, old('genre_id', $book->getGenresIdChecked())))>{{ $genre->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div>
                <p class="mt-3">Imagen actual</p>
                @if ($book->img !== null && Storage::has('img/' . $book->img))
                    <img class="mw-100" src="{{ Storage::url('img/' . $book->img) }}" alt="{{ $book->title }}">
                @else
                    <ion-icon name="image-outline"></ion-icon>
                @endif
            </div>
            <div>
                <label for="img">Imagen</label>
                <input type="file" name="img" id="img" class="form-control"
                    value="{{ old('img', $book->img) }}"
                    @if ($errors->has('img')) aria-describedby="error-img" @endif>
                @error('img')
                    <div class="text-danger" id="error-img">{{ $errors->first('img') }}</div>
                @enderror
            </div>
            <div>
                <label for="img_description">Descripción de la imagen</label>
                <input type="text" name="img_description" id="img_description" class="form-control"
                    value="{{ old('img_description', $book->img_description) }}"
                    @if ($errors->has('img_description')) aria-describedby="error-img_description" @endif>

                @error('img_description')
                    <div class="text-danger" id="error-img_description">{{ $errors->first('img_description') }}</div>
                @enderror
            </div>
            <div>
                <label for="publishDate">Fecha de lanzamiento</label>
                <input type="date" name="publishDate" id="publishDate" class="form-control"
                    value="{{ old('publishDate', $book->publishDate) }}"
                    @if ($errors->has('publishDate')) aria-describedby="error-publishDate" @endif>

                @error('publishDate')
                    <div class="text-danger" id="error-publishDate">{{ $errors->first('publishDate') }}</div>
                @enderror
            </div>
            <div>
                <label for="synopsis">Sinópsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control"
                    @if ($errors->has('synopsis')) aria-describedby="error-synopsis" @endif>{{ old('synopsis', $book->synopsis) }}</textarea>
                @error('synopsis')
                    <div class="text-danger" id="error-synopsis">{{ $errors->first('synopsis') }}</div>
                @enderror
            </div>
            <div>
                <label for="pages">Páginas</label>
                <input type="number" name="pages" id="pages" class="form-control"
                    value="{{ old('pages', $book->pages) }}"
                    @if ($errors->has('pages')) aria-describedby="error-pages" @endif>

                @error('pages')
                    <div class="text-danger" id="error-pages">{{ $errors->first('pages') }}</div>
                @enderror
            </div>
            <div>
                <label for="language">Lenguaje</label>
                <input type="text" name="language" id="language" class="form-control"
                    value="{{ old('language', $book->language) }}">
            </div>
            <div>
                <label for="editorial">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="form-control"
                    value="{{ old('editorial', $book->editorial) }}"
                    @if ($errors->has('editorial')) aria-describedby="error-editorial" @endif>

                @error('editorial')
                    <div class="text-danger" id="error-editorial">{{ $errors->first('editorial') }}</div>
                @enderror
            </div>
            <div>
                <label for="author">Autor</label>
                <input type="text" name="author" id="author" class="form-control"
                    value="{{ old('author', $book->author) }}"
                    @if ($errors->has('author')) aria-describedby="error-author" @endif>
                @error('author')
                    <div class="text-danger" id="error-author">{{ $errors->first('author') }}</div>
                @enderror
            </div>
            <div>
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $book->price) }}"
                    @if ($errors->has('price')) aria-describedby="error-price" @endif>

                @error('price')
                    <div class="text-danger" id="error-price">{{ $errors->first('price') }}</div>
                @enderror
            </div>
            <div class="botones">
                <button type="submit" class="btn btn-success">Publicar</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </section>

@endsection
