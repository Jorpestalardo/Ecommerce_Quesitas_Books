<?php
use Illuminate\Support\Str;

?>

@extends('layouts.main')
@section('title', 'Novedades')
@section('main')
    <section class="secNews">

        <h1>Últimas Novedades de la Literatura Infantil</h1>

        <div class="container">
            <div class="row">
                @foreach ($news as $new)
                    <ul class="col-md-6 col-sm-1">
                        <li>
                            <div class="card">
                                <img class="w-100" src="{{ url('storage/img/' . $new->img) }}"
                                    alt="{{ $new->imgDescription }}">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $new->title }}</h2>
                                    <p class="card-text">{{ Str::limit($new->subtitle, 103) }}</p>
                                    <div class="authorDate">
                                        <p class="card-text">{{ $new->author }}</p>
                                        <p class="card-text">{{ $new->publishDate }}</p>
                                    </div>
                                    <a href="{{ route('news.detalle', ['id' => $new->new_id]) }}" class="btn">Saber
                                        más</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </section>
@endsection
