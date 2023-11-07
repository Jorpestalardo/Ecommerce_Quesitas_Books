<?php
/**
 *  @var \App\Models\Genre[]|\Illuminate\Database\Eloquent\Collection $genres
 * */
?>

@extends('layouts.admin')

@section('title', 'Publicar un nuevo libro ')

@section('main')

    <section class="formNew">
        <h1>¡Publica tu libro!</h1>

        @if (session('message.error'))
            <div class="alert alert-danger">
                {{ session('message.error') }}
            </div>
        @endif

        <form action="{{ route('admin.runNew') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Título<span class="required">*</span></label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                    @if ($errors->has('title')) aria-describedby="error-title" @endif>

                @error('title')
                    <div class="text-danger" id="error-title">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div>
                <label for="genre_id">Géneros:<span class="required">*</span></label>
                @foreach ($genres as $genre)
                    <div class="form-switch">
                        <label class="form-check-label m-2">
                            <input type="checkbox" name="genre_id[]" id="genre_id" class="form-check-input"
                                value="{{ $genre->genre_id }}" @checked(in_array($genre->genre_id, old('genre_id', [])))>
                            {{ $genre->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div>
                <label for="img">Imagen<span class="required">*</span></label>
                <input type="file" name="img" id="img" class="form-control" value="{{ old('img') }}"
                    @if ($errors->has('img')) aria-describedby="error-img" @endif>
                @error('img')
                    <div class="text-danger" id="error-img">{{ $errors->first('img') }}</div>
                @enderror
            </div>
            <div>
                <label for="img_description">Descripción de la imagen<span class="required">*</span></label>
                <input type="text" name="img_description" id="img_description" class="form-control"
                    value="{{ old('img_description') }}"
                    @if ($errors->has('img_description')) aria-describedby="error-img_description" @endif>

                @error('img_description')
                    <div class="text-danger" id="error-img_description">{{ $errors->first('img_description') }}</div>
                @enderror
            </div>
            <div>
                <label for="publishDate">Fecha de lanzamiento<span class="required">*</span></label>
                <input type="date" name="publishDate" id="publishDate" class="form-control"
                    value="{{ old('publishDate', now()->format('Y-m-d')) }}"
                    @if ($errors->has('publishDate')) aria-describedby="error-publishDate" @endif>

                @error('publishDate')
                    <div class="text-danger" id="error-publishDate">{{ $errors->first('publishDate') }}</div>
                @enderror
            </div>
            <div>
                <label for="synopsis">Sinópsis<span class="required">*</span></label>
                <textarea name="synopsis" id="synopsis" class="form-control"
                    @if ($errors->has('synopsis')) aria-describedby="error-synopsis" @endif>{{ old('synopsis') }}</textarea>

                @error('synopsis')
                    <div class="text-danger" id="error-synopsis">{{ $errors->first('synopsis') }}</div>
                @enderror
                <p>La sinopsis debe contener como mínimo 10 carácteres</p>
            </div>
            <div>
                <label for="pages">Páginas<span class="required">*</span></label>
                <input type="number" name="pages" id="pages" class="form-control" value="{{ old('pages') }}"
                    @if ($errors->has('pages')) aria-describedby="error-pages" @endif>

                @error('pages')
                    <div class="text-danger" id="error-pages">{{ $errors->first('pages') }}</div>
                @enderror
            </div>
            <div>
                <label for="language">Lenguaje</label>
                <input type="text" name="language" id="language" class="form-control" value="{{ old('language') }}">
            </div>
            <div>
                <label for="editorial">Editorial<span class="required">*</span></label>
                <input type="text" name="editorial" id="editorial" class="form-control" value="{{ old('editorial') }}"
                    @if ($errors->has('editorial')) aria-describedby="error-editorial" @endif>

                @error('editorial')
                    <div class="text-danger" id="error-editorial">{{ $errors->first('editorial') }}</div>
                @enderror
            </div>
            <div>
                <label for="author">Autor<span class="required">*</span></label>
                <input type="text" name="author" id="author" class="form-control"
                    value="{{ old('author', $usuario->nombre ?? '') }}"
                    @if ($errors->has('author')) aria-describedby="error-author" @endif>

                @error('author')
                    <div class="text-danger" id="error-author">{{ $errors->first('author') }}</div>
                @enderror
            </div>
            <div>
                <label for="price">Precio<span class="required">*</span></label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}"
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
