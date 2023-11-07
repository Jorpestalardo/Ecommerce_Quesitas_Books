<?php

namespace App\Admin;


use App\Models\Usuario; 
use App\Models\Roles; 
use App\Models\Book;
use App\Models\Genre;

class BooksAdmin {

    public function __construct(
        private Book $book,
        private string $title = 'Titulo de prueba para niños',
        private ?string $img = null,
        private string $imgDescription = 'Descripción de imagen de prueba',
        private string $author = 'Autor de prueba',
        private string $publishDate = '2023-07-31',
        private string $synopsis = 'Sinopsis de prueba',
        private int $pages = 200,
        private string $language = 'Español',
        private string $editorial = 'Editorial de prueba',
        float $price = 5000,
    ) {}

    public function getBook(): Book
    {
        return $this->book;
    }


}