<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BooksController extends Controller
{
    public function allBooks() 
    {
        $books = Book::all();

        return view('libros.index', [
            'books' => $books,
        ]);
    }

    public function findById(int $id) 
    {
        $book = Book::findOrFail($id);

        return view('libros/detalle', [
            'book' => $book,
        ]);
    }

    public function index() 
    {
        $books = Book::with(['genres'])->get();

        return view('libros.index', [
            'books' => $books,
        ]);
    }
}
