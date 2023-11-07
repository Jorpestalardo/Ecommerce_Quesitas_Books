<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Book;
use App\Models\UsuariosPerfil;
use App\Models\Usuario;




class AdminApiController extends Controller
{
    public function indexNews()
    {
        //para que retornemos json con laravel se usa el response->json... 
        return response()->json([
            'status' => 0,
            'data' => News::all(),
        ]);
    }

    public function indexBooks()
    {
        //para que retornemos json con laravel se usa el response->json... 
        return response()->json([
            'status' => 0,
            'data' => Book::all(),
        ]);
    }

    public function indexUsuarios()
    {
        $usuarios = UsuariosPerfil::where('roles_id', 2)->get();

        return response()->json([
            'status' => 0,
            'data' => $usuarios,
        ]);
    }

    public function usuarioId(int $id)
    {
        return response()->json([
            'status' => 0,
            'data' => Usuario::findOrFail($id),
        ]);
    }

    public function bookId(int $id)
    {
        return response()->json([
            'status' => 0,
            'data' => Book::findOrFail($id),
        ]);
    }

    public function newId(int $id)
    {
        return response()->json([
            'status' => 0,
            'data' => News::findOrFail($id),
        ]);
    }

    public function createNew(Request $request)
    {
        // Obtiene las reglas de validación desde el modelo News.
        $rules = News::validationRules();

        // Validamos los datos del formulario con las reglas definidas.
        $validator = Validator::make($request->all(), $rules, News::validationRulesAlerts());

        // Si la validación falla, retornamos un error 422 con los mensajes de error.
        if ($validator->fails()) {
            return response()->json([
                'status' => 1,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Si la validación es exitosa, procedemos a crear la nueva novedad.
        News::create($request->all());

        return response()->json([
            'status' => 0,
        ]);
    }

    public function updateNew(Request $request, int $id)
    {
        // Buscamos la novedad por el ID
        $news = News::findOrFail($id);

        // Obtiene las reglas de validación desde el modelo News.
        $rules = News::validationRules();

        // Validamos los datos del formulario con las reglas definidas.
        $validator = Validator::make($request->all(), $rules, News::validationRulesAlerts());

        // Si la validación falla, retornamos un error 422 con los mensajes de error.
        if ($validator->fails()) {
            return response()->json([
                'status' => 1,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Lista de datos para la edición de la novedad
        $datosEdicion = [
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'img' => $request->input('img'),
            'imgDescription' => $request->input('imgDescription'),
            'info' => $request->input('info'),
            'author' => $request->input('author'),
            'publishDate' => $request->input('publishDate'),
            'link' => $request->input('link'),
        ];

        // Actualizamos los campos de la novedad con los nuevos valores.
        $news->update($datosEdicion);

        return response()->json([
            'status' => 0,
        ]);
    }

    public function deleteNew(int $id)
    {
        // Busca la novedad por su ID (1 como en el test)
        $novedad = News::findOrFail($id);

        // Verifica que la novedad pertenece al usuario autenticado
        if ($novedad->user_id !== auth()->user()->user_id) {
            return response()->json(['message' => 'No tienes permiso para eliminar esta novedad'], 403);
        }

        // Elimina la novedad
        $novedad->delete();

        return response()->json(['message' => 'Novedad eliminada con éxito'], 200);
    }

    public function createBook(Request $request)
    {
        // Obtiene las reglas de validación desde el modelo Book.
        $rules = Book::validationRules();

        // Valida los datos del formulario con las reglas definidas.
        $validator = Validator::make($request->all(), $rules, Book::validationRulesAlerts());

        // Si la validación falla, retornamos un error 422 con los mensajes de error.
        if ($validator->fails()) {
            return response()->json([
                'status' => 1,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Si la validación es exitosa, procedemos a crear el nuevo libro.
        Book::create($request->all());

        return response()->json([
            'status' => 0,
        ]);
    }

    public function updateBook(Request $request, $id)
    {
        // Obtenemos las reglas de validación desde el modelo Book.
        $rules = Book::validationRules();

        // Validamos los datos del formulario con las reglas definidas.
        $validator = Validator::make($request->all(), $rules, Book::validationRulesAlerts());

        // Si la validación falla, retornamos un error 422 con los mensajes de error.
        if ($validator->fails()) {
            return response()->json([
                'status' => 1,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Obtiene el libro existente desde la base de datos
        $libroExistente = Book::findOrFail($id);

        // Lista de datos para la edición del libro
        $datosEdicion = [
            'title' => $request->input('title'),
            'publishDate' => $request->input('publishDate'),
            'price' => $request->input('price'),
            'synopsis' => $request->input('synopsis'),
            'pages' => $request->input('pages'),
            'language' => $request->input('language'),
            'editorial' => $request->input('editorial'),
            'author' => $request->input('author'),
            'img' => $request->input('img'),
            'img_description' => $request->input('img_description'),
            // Otros campos que desees editar...
        ];

        // Modifica los atributos del libro existente con los nuevos datos de edición
        $libroExistente->update($datosEdicion);

        return response()->json([
            'status' => 0,
            'message' => 'Libro actualizado exitosamente.',
        ]);
    }

    public function deleteBook(int $id)
    {
        // Busca el libro por su ID
        $libro = Book::findOrFail($id);

        // Verifica que el libro pertenece al usuario autenticado
        if ($libro->user_id !== auth()->user()->user_id) {
            return response()->json(['message' => 'No tienes permiso para eliminar este libro'], 403);
        }

        // Elimina el libro
        $libro->delete();

        return response()->json(['message' => 'Libro eliminado con éxito'], 200);
    }

}