@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('main')

    <section class="editBook">
        <h1>Editar mi perfil</h1>

        <form action="{{ route('usuario.editarPerfilAction', ['id' => $usuario->user_id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="{{ old('nombre', $usuario->nombre) }}"
                    @if ($errors->has('nombre')) aria-describedby="error-nombre" @endif>
                @error('nombre')
                    <div class="text-danger" id="error-nombre">{{ $errors->first('nombre') }}</div>
                @enderror
            </div>
            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control"
                    value="{{ old('apellido', $usuario->apellido) }}"
                    @if ($errors->has('apellido')) aria-describedby="error-apellido" @endif>
                @error('apellido')
                    <div class="text-danger" id="error-apellido">{{ $errors->first('apellido') }}</div>
                @enderror
            </div>
            <div>
                <p class="mt-3">Imagen actual</p>
                @if ($usuario->img !== null && Storage::has('img/' . $usuario->img))
                    <img class="mw-100" src="{{ Storage::url('img/' . $usuario->img) }}" alt="{{ $usuario->nombre }}">
                @else
                    <ion-icon name="image-outline"></ion-icon>
                @endif
            </div>
            <div>
                <label for="img">Imagen</label>
                <input type="file" name="img" id="img" class="form-control"
                    value="{{ old('img', $usuario->img) }}">
            </div>
            <div>
                <label for="biografia">Contanos un poco de vos:</label>
                <textarea name="biografia" id="biografia" class="form-control">{{ old('biografia', $usuario->biografia) }}</textarea>
                <label for="libroPreferido">Libro Preferido:</label>
                <input type="text" name="libroPreferido" id="libroPreferido" class="form-control"
                    value="{{ old('libroPreferido', $usuario->libroPreferido) }}">
            </div>

            <div class="botones">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('usuario.perfil') }}" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </section>

@endsection
