<?php
namespace Tests\Feature;

use App\Models\Usuario;
use App\Models\Roles;
use App\Models\News;
use App\Models\Book;
use App\Models\Genre;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class AdminAPITest extends TestCase
{

    use RefreshDatabase;

    protected bool $seed = true;

    public function UsuarioValido(): self
    {
        $usuario = new Usuario();
        $usuario->user_id = 1;
        return $this->actingAs($usuario);
    }

    public function test_muestra_todas_las_novedades_mediante_get_abm()
    {


        $response = $this->UsuarioValido()->getJson('/api/news');
        //para verificar la petición, podemos usar dump();
        //$response->dump();


        /**
         * Status: 0,
         * data: [
         *  {
         *new_id	
         *usuario_id	
         *title	
         *subtitle	
         *img	
         *imgDescription	
         *info
         *author	
         *publishDate	
         *link
         * 
         * }
         * ]
         *El status indica que todo salio bien (0) si sale otro numero (todo mal)
         *data contiene los resultados que se incluyen como respuesta de la petición (Array de Novedades);
         */
        $response
            ->assertStatus(200)


            ->assertJsonPath('status', 0)
            ->assertJsonCount(8, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    // Indicamos que debe ser un array de objetos.
                    '*' => [
                        // Indicamos los campos que esos objetos deben tener.
                        'new_id',
                        'user_id',
                        'title',
                        'subtitle',
                        'img',
                        'imgDescription',
                        'info',
                        'author',
                        'publishDate',
                        'link',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);


    }

    public function test_muestra_todos_los_libros_mediante_get_abm()
    {


        $response = $this->UsuarioValido()->getJson('/api/books');

        /**
         * Status: 0,
         * data: [
         *  {
         *book_id	
         *usuario_id	
         *title	
         *publishDate	
         *price	
         *synopsis	
         *pages	
         *language	
         *editorial	
         *author	
         *img	
         *img_description
         * 
         * }
         * ]
         *El status indica que todo salio bien (0) si sale otro numero (todo mal)
         *data contiene los resultados que se incluyen como respuesta de la petición (Array de Novedades);
         */
        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure([
                'status',
                'data' => [
                    // Indicamos que debe ser un array de objetos.
                    '*' => [
                        // Indicamos los campos que esos objetos deben tener.
                        'book_id',
                        'user_id',
                        'title',
                        'publishDate',
                        'price',
                        'synopsis',
                        'pages',
                        'language',
                        'editorial',
                        'author',
                        'img',
                        'img_description',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    public function test_muestra_todos_los_usuarios_con_rol_id_2_mediante_get_abm()
    {
        $response = $this->UsuarioValido()->getJson('/api/usuarios');

        $response
            ->assertStatus(200)
            ->assertJsonPath('status', 0)
            ->assertJsonCount(13, 'data') // Asegúrate de ajustar el valor 5 al número esperado de usuarios con rol ID 2.
            ->assertJsonStructure([
                'status',
                'data' =>
                [
                    '*' =>
                    [
                        'user_id',
                        'roles_id',
                        'email',
                        'password',
                        'nombre',
                        'apellido',
                        'biografia',
                        'libroPreferido',
                        'img',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]);
    }

    public function test_muestra_una_novedad_por_su_id_mediante_get_abm()
    {
        $id = 1;

        $response = $this->UsuarioValido()->getJson('/api/news/' . $id);
        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.new_id', $id)
                    // Indicamos los tipos de dato que deben tener las otras propiedades.
                    ->whereAllType([
                        'status' => 'integer',
                        'data.new_id' => 'integer',
                        'data.user_id' => 'integer',
                        'data.title' => 'string',
                        'data.subtitle' => 'string',
                        'data.img' => 'string',
                        'data.imgDescription' => 'string',
                        'data.info' => 'string',
                        'data.author' => 'string',
                        'data.publishDate' => 'string',
                        'data.link' => 'string',
                        'data.created_at' => 'string|null',
                        'data.updated_at' => 'string|null',
                    ])
            );

    }

    public function test_muestra_un_libro_por_su_id_mediante_get_abm()
    {
        $id = 1;
        $response = $this->UsuarioValido()->getJson('/api/books/' . $id);
        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.book_id', $id)
                    // Indicamos los tipos de dato que deben tener las otras propiedades.
                    ->whereAllType([
                        'status' => 'integer',
                        'data.book_id' => 'integer',
                        'data.user_id' => 'integer',
                        'data.title' => 'string',
                        'data.publishDate' => 'string',
                        'data.price' => 'integer|double',
                        'data.synopsis' => 'string',
                        'data.pages' => 'integer|double',
                        'data.language' => 'string',
                        'data.editorial' => 'string',
                        'data.author' => 'string',
                        'data.img' => 'string',
                        'data.img_description' => 'string',
                        'data.created_at' => 'string|null',
                        'data.updated_at' => 'string|null',
                    ])
            );

    }

    public function test_muestra_un_usuario_por_id_mediante_get_abm()
    {
        $id = 1;

        $response = $this->UsuarioValido()->getJson('/api/usuarios/' . $id);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.user_id', $id)
                    // Indicamos los tipos de dato que deben tener las otras propiedades.
                    ->whereAllType([
                        'status' => 'integer',
                        'data.user_id' => 'integer',
                        'data.roles_id' => 'integer',
                        'data.email' => 'string',
                        'data.nombre' => 'string',
                        'data.apellido' => 'string',
                        'data.biografia' => 'string|null',
                        'data.libroPreferido' => 'string|null',
                        'data.img' => 'string|null',
                        'data.created_at' => 'string|null',
                        'data.updated_at' => 'string|null',
                    ])
            );
    }




    public function test_creando_una_novedad_mediante_post_abm()
    {
        $data = [
            'user_id' => 1,
            'title' => 'Los 5 mejores libros para leer a tus hijos antes de dormir',
            'subtitle' => 'La lectura antes de dormir ayuda a conciliar el sueño y relaja el cerebro.',
            'img' => 'imagen.jpg',
            'imgDescription' => 'Mini colección de libros infantiles, para antes de dormir.',
            'info' => 'Leer antes de dormir a los niños es importante porque: Fortalece el vínculo emocional. Estimula la imaginación. Mejora el lenguaje y vocabulario. Ayuda a la relajación y el sueño. Fomenta el interés por la lectura.',
            'author' => 'Abril',
            'publishDate' => '2023-07-07',
            'link' => 'libros.com',
        ];
        $response = $this->UsuarioValido()->postJson('/api/news', $data);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->where('status', 0),
            );

        // Para verificar que la novedad se creó, vamos a hacer una petición que lea la novedad (sería la
        // 9) y verifique que los datos sean los mismos que enviamos.

        $response = $this->UsuarioValido()->getJson('/api/news/9');

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.user_id', $data['user_id'])
                    ->where('data.title', $data['title'])
                    ->where('data.subtitle', $data['subtitle'])
                    ->where('data.img', $data['img'])
                    ->where('data.imgDescription', $data['imgDescription'])
                    ->where('data.info', $data['info'])
                    ->where('data.author', $data['author'])
                    ->where('data.publishDate', $data['publishDate'])
                    ->where('data.link', $data['link'])
                    // etc() sirve para decirle a Laravel que puede haber otras cosas en el JSON, y que está
                    // bien.
                    ->etc()
            );
    }


    public function test_creando_un_libro_mediante_post_abm()
    {
        $data = [
            'user_id' => 1,
            'title' => 'Las maravillas de Pancho',
            'publishDate' => '2023-07-07',
            'price' => 5000,
            'synopsis' => 'Es un libro precioso, que trata de un jovencito que vive aventuras con su gato German y su bicicleta, juntos aprenderan que es la amistad.',
            'pages' => 200,
            'language' => 'Español',
            'editorial' => 'Panchito Editorial',
            'author' => 'Federico Gimenez',
            'img' => 'imagen.jpg',
            'img_description' => 'Imagenes descriptivas de Pancho en bicicleta',
            'created_at' => 'string|null',
            'updated_at' => 'string|null',
        ];
        $response = $this->UsuarioValido()->postJson('/api/books', $data);

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json->where('status', 0),
            );

        // Para verificar que la novedad se creó, vamos a hacer una petición que lea la novedad (sería la
        // 9) y verifique que los datos sean los mismos que enviamos.

        $response = $this->UsuarioValido()->getJson('/api/books/6');

        $response
            ->assertStatus(200)
            ->assertJson(
                fn(AssertableJson $json) =>
                $json
                    ->where('status', 0)
                    ->where('data.user_id', $data['user_id'])
                    ->where('data.title', $data['title'])
                    ->where('data.publishDate', $data['publishDate'])
                    ->where('data.price', $data['price'])
                    ->where('data.synopsis', $data['synopsis'])
                    ->where('data.pages', $data['pages'])
                    ->where('data.language', $data['language'])
                    ->where('data.editorial', $data['editorial'])
                    ->where('data.author', $data['author'])
                    ->where('data.img', $data['img'])
                    ->where('data.img_description', $data['img_description'])
                    // etc() sirve para decirle a Laravel que puede haber otras cosas en el JSON, y que está
                    // bien.
                    ->etc()
            );
    }


    //404 por peticiones de id que no existen.
    public function test_pide_un_usuario_por_id_que_no_existe_404_abm()
    {
        $response = $this->UsuarioValido()->getJson('/api/usuarios/1150');

        $response->assertStatus(404);
    }



    public function test_edita_una_novedad_por_su_id_mediante_put_abm()
    {
        // Obtiene una novedad existente desde la base de datos en este caso la de ID 1
        $novedadExistente = News::findOrFail(1);

        // Listado de datos para la edición de la novedad
        $datosEdicion = [
            'title' => 'Nuevo título de la novedad',
            'subtitle' => 'Nuevo subtítulo de la novedad',
            'img' => 'nueva_imagen.jpg',
            'imgDescription' => 'Nueva descripción de la imagen de la novedad',
            'info' => 'Nueva información de la novedad',
            'author' => 'Nuevo autor de la novedad',
            'publishDate' => '2023-08-08',
            'link' => 'https://newexample.com',
        ];

        // Modifica los atributos de la novedad existente con los nuevos datos de edición
        $novedadExistente->update($datosEdicion);

        // Realiza la solicitud PUT para actualizar la novedad
        $response = $this->UsuarioValido()->putJson('/api/news/' . $novedadExistente->new_id, $datosEdicion);

        // Verifica que la solicitud haya sido éxitosa
        $response->assertStatus(200);

        // Obtiene la novedad actualizada desde la base de datos 
        $novedadActualizada = News::find($novedadExistente->new_id);

        // Verifica que los datos de la novedad se hayan actualizado correctamente
        $this->assertEquals($datosEdicion['title'], $novedadActualizada->title);
        $this->assertEquals($datosEdicion['subtitle'], $novedadActualizada->subtitle);
        $this->assertEquals($datosEdicion['img'], $novedadActualizada->img);
        $this->assertEquals($datosEdicion['imgDescription'], $novedadActualizada->imgDescription);
        $this->assertEquals($datosEdicion['info'], $novedadActualizada->info);
        $this->assertEquals($datosEdicion['author'], $novedadActualizada->author);
        $this->assertEquals($datosEdicion['publishDate'], $novedadActualizada->publishDate);
        $this->assertEquals($datosEdicion['link'], $novedadActualizada->link);


    }

    public function test_elimina_una_novedad_por_su_id_mediante_delete_abm()
    {
        // Obtiene una novedad existente desde la base de datos por su ID en este caso 1
        $novedadParaEliminar = News::findOrFail(1);

        // Realiza la solicitud DELETE para eliminar la novedad
        $response = $this->UsuarioValido()->deleteJson('/api/news/' . $novedadParaEliminar->new_id);

        // Verifica que la solicitud haya sido éxitosa
        $response->assertStatus(200);

        // Verifica que la novedad ya no existe en la base de datos
        $this->assertNull(News::find($novedadParaEliminar->new_id));
    }


    public function test_edita_un_libro_abm()
    {
        // Obtiene un libro existente desde la base de datos con el ID 1
        $libroExistente = Book::findOrFail(1);

        // Lista de datos para editar Libro (Book)
        $datosEdicion = [
            'title' => 'Nuevo título del libro',
            'publishDate' => '2023-08-08',
            'price' => 1500,
            'synopsis' => 'Nueva sinopsis del libro',
            'pages' => 200,
            'language' => 'Español',
            'editorial' => 'Nueva Editorial',
            'author' => 'Nuevo Autor',
            'img' => 'nueva_imagen.jpg',
            'img_description' => 'Nueva descripción de la imagen del libro',
        ];

        // Modifica los atributos del libro existente con los nuevos datos de edición
        $libroExistente->update($datosEdicion);

        // Realiza la solicitud PUT  para editar el libro 
        $response = $this->UsuarioValido()->putJson('/api/books/' . $libroExistente->book_id, $datosEdicion);

        // Verifica que la solicitud haya sido éxitosa
        $response->assertStatus(200);

        // Obtiene el libro actualizado desde la base de datos 
        $libroActualizado = Book::find($libroExistente->book_id);

        // Verifica que los datos del libro se hayan actualizado correctamente 
        $this->assertEquals($datosEdicion['publishDate'], $libroActualizado->publishDate);
        $this->assertEquals($datosEdicion['price'], $libroActualizado->price);
        $this->assertEquals($datosEdicion['synopsis'], $libroActualizado->synopsis);
        $this->assertEquals($datosEdicion['pages'], $libroActualizado->pages);
        $this->assertEquals($datosEdicion['language'], $libroActualizado->language);
        $this->assertEquals($datosEdicion['editorial'], $libroActualizado->editorial);
        $this->assertEquals($datosEdicion['author'], $libroActualizado->author);
        $this->assertEquals($datosEdicion['img'], $libroActualizado->img);
        $this->assertEquals($datosEdicion['img_description'], $libroActualizado->img_description);

    }

    public function test_elimina_un_libro_por_su_id_mediante_delete_abm()
    {
        // Obtiene un libro existente desde la base de datos por su ID (por ejemplo, ID  1)
        $libroParaEliminar = Book::findOrFail(1);

        // Realiza la solicitud DELETE para eliminar el libro
        $response = $this->UsuarioValido()->deleteJson('/api/books/' . $libroParaEliminar->book_id);

        // Verifica que la solicitud haya sido exitosa
        $response->assertStatus(200);

        // Verifica que el libro ya no existe en la base de datos
        $this->assertNull(Book::find($libroParaEliminar->book_id));
    }



}