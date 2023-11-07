<?php

namespace App\Admin;


use App\Models\Usuario; 
use App\Models\Roles; 
use App\Models\News; 

class NewsAdmin {

    public function __construct(
        private News $news,
        private string $title = 'Título de prueba para noticias',
        private ?string $subtitle = 'Subtítulo de prueba',
        private ?string $img = null,
        private string $imgDescription = 'Descripción de imagen de prueba',
        private string $info = 'Información de prueba que debe pasar las 20 letras y espacios',
        private string $author = 'Autor de prueba',
        private string $publishDate = '2023-07-31',
        private string $link = 'https://example.com'
    ) {}

    public function getNews(): News
    {
        return $this->news;
    }
    
}