<?php

namespace Tests\Unit;

use App\Admin\NewsAdmin;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class NewsAdminTest extends TestCase
{
    use RefreshDatabase;

    public function createNews(
        string $title = 'Título de prueba para noticias',
        ?string $subtitle = 'Subtítulo de prueba',
        ?string $img = null,
        string $imgDescription = 'Descripción de imagen de prueba',
        string $info = 'Información de prueba que debe pasar las 20 letras y espacios',
        string $author = 'Autor de prueba',
        string $publishDate = '2023-07-31',
        string $link = 'https://example.com'
    ): News {
        return new News([
            'title' => $title,
            'subtitle' => $subtitle,
            'img' => $img,
            'imgDescription' => $imgDescription,
            'info' => $info,
            'author' => $author,
            'publishDate' => $publishDate,
            'link' => $link,
        ]);
    }

    public function test_crear_noticia_abm()
    {
        $news = $this->createNews();

        // Crea una instancia de NewsAdmin sin pasar una noticia (con los datos del constructor)
        $newsAdmin = new NewsAdmin($news);

        // Obtiene la noticia creada
        $createdNews = $newsAdmin->getNews();

        // Realiza las validaciones para verificar el resultado
        $this->assertInstanceOf(News::class, $createdNews);
        $this->assertEquals('Título de prueba para noticias', $createdNews->title);
        $this->assertEquals('Subtítulo de prueba', $createdNews->subtitle);
        $this->assertNull($createdNews->img);
        $this->assertEquals('Descripción de imagen de prueba', $createdNews->imgDescription);
        $this->assertEquals('Información de prueba que debe pasar las 20 letras y espacios', $createdNews->info);
        $this->assertEquals('Autor de prueba', $createdNews->author);
        $this->assertEquals('2023-07-31', $createdNews->publishDate);
        $this->assertEquals('https://example.com', $createdNews->link);
    }

    public function test_editar_noticia_abm()
    {
        // Crea una instancia de NewsAdmin con una noticia existente en el constructor
        $news = $this->createNews();

        $newsAdmin = new NewsAdmin($news);

        // Obtiene la noticia creada
        $editedNews = $newsAdmin->getNews();

        // Realiza la edición de la noticia (cambia el título y el autor)
        $editedNews->title = 'Nuevo título de noticia EDITADO';
        $editedNews->author = 'Autor editado';

        // Realiza las validaciones para verificar que la noticia se ha editado correctamente
        $this->assertEquals('Nuevo título de noticia EDITADO', $editedNews->title);
        $this->assertEquals('Autor editado', $editedNews->author);
    }

    public function test_eliminar_noticia_abm()
    {
        // Crea una instancia de NewsAdmin con una noticia existente en el constructor
        $news = $this->createNews();

        $newsAdmin = new NewsAdmin($news);

        // Obtiene la noticia creada
        $newsToDelete = $newsAdmin->getNews();

        // Realiza la eliminación de la noticia
        $newsToDelete->delete();

        // Verifica que la noticia haya sido eliminada
        $this->assertNull($newsToDelete->id);
    }
}