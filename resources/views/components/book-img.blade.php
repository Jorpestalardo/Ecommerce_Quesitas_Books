<?php
use Illuminate\Support\Facades\Storage;
?>


@if ($book->img !== null && Storage::exists('img/' . $book->img))
    <img src="{{ Storage::url('img/' . $book->img) }}" class="img-fluid w-100" alt="{{ $book->title }}">
@else
    <div class="portada">
        <ion-icon name="image-outline"></ion-icon>
        <p>No hay portada</p>
    </div>
@endif
