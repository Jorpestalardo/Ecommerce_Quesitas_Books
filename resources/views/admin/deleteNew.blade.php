@extends('layouts.admin')
@section('title', 'Confirmar eliminación de ' . $new->title)
@section('main')

    <section class="deleteBook">
        <h1>Confirmar eliminación de "{{ $new->title }}"</h1>
        <x-new-data :new="$new" />

        <form action="{{ route('admin.deleteActionNew', ['id' => $new->new_id]) }}" method="post">
            @csrf
            <p>¿Estás seguro que quieres eliminar '{{ $new->title }}'?</p>

            <div class="d-grid gap-2 d-md-block pb-5 pt-5">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a class="btn btn-secondary" href="{{ route('admin.dashboardNews') }}">Volver</a>
            </div>
        </form>
    </section>
@endsection
