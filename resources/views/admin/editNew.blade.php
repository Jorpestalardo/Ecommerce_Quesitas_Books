@extends('layouts.admin')

@section('title', 'Editar: ' . $new->title)

@section('main')

    <section class="editBook">
        <h1>Editar {{ $new->title }}</h1>

        <form action="{{ route('admin.editActionNew', ['id' => $new->new_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titulo">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $new->title) }}"
                    @if ($errors->has('title')) aria-describedby="error-title" @endif>
                @error('title')
                    <div class="text-danger" id="error-title">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            <div>
                <div>
                    <label for="subtitle">Subtítulo</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control"
                        value="{{ old('subtitle', $new->subtitle) }}"
                        @if ($errors->has('subtitle')) aria-describedby="error-subtitle" @endif>
                    @error('subtitle')
                        <div class="text-danger" id="error-subtitle">{{ $errors->first('subtitle') }}</div>
                    @enderror
                </div>
                <div>
                    <p class="mt-3">Imagen actual</p>
                    {{-- Versión Storage --}}
                    @if ($new->img !== null && Storage::has('img/' . $new->img))
                        <img class="mw-100" src="{{ Storage::url('img/' . $new->img) }}" alt="{{ $new->titulo }}">
                    @else
                        <ion-icon name="image-outline"></ion-icon>
                    @endif
                </div>
                <div>
                    <label for="img">Imagen</label>
                    <input type="file" name="img" id="img" class="form-control"
                        value="{{ old('img', $new->img) }}"
                        @if ($errors->has('img')) aria-describedby="error-img" @endif>
                    @error('img')
                        <div class="text-danger" id="error-img">{{ $errors->first('img') }}</div>
                    @enderror
                </div>
                <div>
                    <label for="imgDescription">Descripción de la imagen</label>
                    <input type="text" name="imgDescription" id="imgDescription" class="form-control"
                        value="{{ old('imgDescription', $new->imgDescription) }}"
                        @if ($errors->has('imgDescription')) aria-describedby="error-imgDescription" @endif>
                    @error('imgDescription')
                        <div class="text-danger" id="error-imgDescription">{{ $errors->first('imgDescription') }}</div>
                    @enderror
                </div>
                <div>
                    <label for="info">Información</label>
                    <textarea name="info" id="info" class="form-control"
                        @if ($errors->has('info')) aria-describedby="error-info" @endif>{{ old('info', $new->info) }}</textarea>
                    @error('info')
                        <div class="text-danger" id="error-info">{{ $errors->first('info') }}</div>
                    @enderror
                </div>
                <div>
                    <label for="author">Autor</label>
                    <input type="text" name="author" id="author" class="form-control"
                        value="{{ old('author', $new->author) }}"
                        @if ($errors->has('author')) aria-describedby="error-author" @endif>
                    @error('author')
                        <div class="text-danger" id="error-author">{{ $errors->first('author') }}</div>
                    @enderror
                </div>
                <div>
                    <label for="publishDate">Fecha de Publicación</label>
                    <input type="date" name="publishDate" id="publishDate" class="form-control"
                        value="{{ old('publishDate', $new->publishDate) }}"
                        @if ($errors->has('publishDate')) aria-describedby="error-publishDate" @endif>
                    @error('publishDate')
                        <div class="text-danger" id="error-publishDate">{{ $errors->first('publishDate') }}</div>
                    @enderror
                </div>
                <div>
                    <label for="link">Link</label>
                    <input type="text" name="link" id="link" class="form-control"
                        value="{{ old('link', $new->link) }}"
                        @if ($errors->has('link')) aria-describedby="error-link" @endif>
                    @error('link')
                        <div class="text-danger" id="error-link">{{ $errors->first('link') }}</div>
                    @enderror
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-success">Publicar</button>
                    <a href="{{ route('admin.dashboardNews') }}" class="btn btn-secondary">Volver</a>
                </div>
        </form>
    </section>

@endsection
