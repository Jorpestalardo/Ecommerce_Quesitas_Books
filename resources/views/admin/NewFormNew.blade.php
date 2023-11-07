@extends('layouts.admin')

@section('title', 'Publicar una nueva novedad ')

@section('main')

    <section class="formNew">
        <h1>¡Publica tu novedad!</h1>

        @if (session('message.error'))
            <div class="alert alert-danger">
                {{ session('message.error') }}
            </div>
        @endif

        <form action="{{ route('admin.NewRunNew') }}" method="POST" enctype="multipart/form-data">
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
                <label for="subtitle">Subtítulo<span class="required">*</span></label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}"
                    @if ($errors->has('subtitle')) aria-describedby="error-subtitle" @endif>
                @error('subtitle')
                    <div class="text-danger" id="error-subtitle">{{ $errors->first('subtitle') }}</div>
                @enderror
                <p>El subtítulo debe contener como mínimo 10 carácteres</p>
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
                <label for="imgDescription">Descripción de la imagen<span class="required">*</span></label>
                <input type="text" name="imgDescription" id="imgDescription" class="form-control"
                    value="{{ old('imgDescription') }}"
                    @if ($errors->has('imgDescription')) aria-describedby="error-imgDescription" @endif>
                @error('imgDescription')
                    <div class="text-danger" id="error-imgDescription">{{ $errors->first('imgDescription') }}</div>
                @enderror
            </div>
            <div>
                <label for="info">Información<span class="required">*</span></label>
                <textarea name="info" id="info" class="form-control"
                    @if ($errors->has('info')) aria-describedby="error-info" @endif>{{ old('info') }}</textarea>
                @error('info')
                    <div class="text-danger" id="error-info">{{ $errors->first('info') }}</div>
                @enderror
                <p>La información debe contener como mínimo 20 carácteres</p>
            </div>
            <div>
                <input type="hidden" name="author" id="author" class="form-control"
                    value="{{ old('author', $usuario->nombre ?? '') }}"
                    @if ($errors->has('author')) aria-describedby="error-author" @endif>
                @error('author')
                    <div class="text-danger" id="error-author">{{ $errors->first('author') }}</div>
                @enderror
            </div>
            <div>
                <input type="hidden" name="publishDate" id="publishDate" class="form-control"
                    value="{{ old('publishDate', now()->format('Y-m-d')) }}"
                    @if ($errors->has('publishDate')) aria-describedby="error-publishDate" @endif>
                @error('publishDate')
                    <div class="text-danger" id="error-publishDate">{{ $errors->first('publishDate') }}</div>
                @enderror
            </div>
            <div>
                <label for="link">Link<span class="required">*</span></label>
                <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}"
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
