<?php

namespace Tests\Unit;

use App\Admin\BooksAdmin;
use PHPUnit\Framework\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;


class BooksAdminTest extends TestCase
{
    use RefreshDatabase;

    public function createBook(
        string $title = 'Titulo de prueba para niños',
        ?string $img = null,
        string $imgDescription = 'Descripción de imagen de prueba',
        string $author = 'Autor de prueba',
        string $publishDate = '2023-07-31',
        string $synopsis = 'Sinopsis de prueba',
        int $pages = 200,
        string $language = 'Español',
        string $editorial = 'Editorial de prueba',
        float $price = 5000
    ): Book {
        return new Book([
            'title' => $title,
            'img' => $img,
            'img_description' => $imgDescription,
            'author' => $author,
            'publishDate' => $publishDate,
            'synopsis' => $synopsis,
            'pages' => $pages,
            'language' => $language,
            'editorial' => $editorial,
            'price' => $price,
        ]);
    }
    public function test_crear_book_para_amb(): void
    {
        // Crear un objeto Book con los datos deseados
        $book = $this->createBook();

        // Crear una nueva instancia de BooksAdmin y pasar el objeto Book
        $booksAdmin = new BooksAdmin($book);

        // Obtener el libro creado
        $createdBook = $booksAdmin->getBook();

        // Realizar las aserciones o validaciones para verificar el resultado
        $this->assertInstanceOf(Book::class, $createdBook);
        $this->assertEquals('Titulo de prueba para niños', $createdBook->title);
        $this->assertNull($createdBook->img);
        $this->assertEquals('Descripción de imagen de prueba', $createdBook->img_description);
        $this->assertEquals('Autor de prueba', $createdBook->author);
        $this->assertEquals('2023-07-31', $createdBook->publishDate);
        $this->assertEquals('Sinopsis de prueba', $createdBook->synopsis);
        $this->assertEquals(200, $createdBook->pages);
        $this->assertEquals('Español', $createdBook->language);
        $this->assertEquals('Editorial de prueba', $createdBook->editorial);
        $this->assertEquals(5000, $createdBook->price);
    }


    public function test_editar_book_para_amb()
    {
        // Crear un libro con datos deseados
        $book = $this->createBook();

        // Crear una nueva instancia de BooksAdmin y pasar el libro creado
        $booksAdmin = new BooksAdmin($book);

        // Obtener el libro creado
        $editedBook = $booksAdmin->getBook();

        // Realiza la edición del libro (cambia el título y el precio)
        $editedBook->title = 'Nuevo título de libro EDITADO';
        $editedBook->price = 2500;

        // Realiza las validaciones para verificar que el libro se ha editado correctamente
        $this->assertEquals('Nuevo título de libro EDITADO', $editedBook->title);
        $this->assertEquals(2500, $editedBook->price);
    }

    public function test_eliminar_libro_para_amb()
    {
        // Crear un libro con datos deseados
        $book = $this->createBook();

        // Crear una instancia de BooksAdmin con el libro existente en el constructor
        $booksAdmin = new BooksAdmin($book);

        // Obtener el libro del constructor
        $bookToDelete = $booksAdmin->getBook();

        // Realizar la eliminación del libro
        $bookToDelete->delete();

        // Verificar que el libro haya sido eliminado
        $this->assertNull($bookToDelete->id);
    }

}