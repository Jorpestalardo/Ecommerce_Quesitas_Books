<?php
use Illuminate\Support\Facades\Storage;
?>

@if ($new->img !== null && Storage::exists('img/' . $new->img))
    <img src="{{ Storage::url('img/' . $new->img) }}" class="img-fluid w-100" alt="{{ $new->title }}">
@else
    <div class="portada">
        <ion-icon name="image-outline"></ion-icon>
        <p>No hay portada</p>
    </div>
@endif
