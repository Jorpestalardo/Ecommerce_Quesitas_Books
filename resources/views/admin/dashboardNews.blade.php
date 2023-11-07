<?php
use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.admin')
@section('title', 'Panel de administración')
@section('main')

    <section class="dashboard">
        <div class="introDash">
            <h1>Aquí encontrarás tus Novedades</h1>
            <p>Podrás crear, eliminar e incluso editar tus publicaciones favoritas</p>
            <p>¡Espero que lo disfrutes!</p>
        </div>

        <a href="{{ route('admin.NewFormNew') }}" class="btn">Publicar una novedad</a>

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción de la imagen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Subtítulo</th>
                        <th scope="col">Información</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Fecha de publicación</th>
                        <th scope="col">Link</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                        <tr>
                            <td>{{ $new->new_id }}</td>
                            <td>
                                <x-new-img :new="$new" />
                            </td>
                            <td>{{ $new->imgDescription }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->subtitle }}</td>
                            <td>{{ $new->info }}</td>
                            <td>{{ $new->author }}</td>
                            <td>{{ $new->publishDate }}</td>
                            <td>{{ $new->link }}</td>
                            <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.editNew', ['id' => $new->new_id]) }}" class="btn">Editar</a>
                                <a href="{{ route('admin.deleteNew', ['id' => $new->new_id]) }}"
                                    class="btn">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
