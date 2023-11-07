<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use App\Models\Genre;
use App\Models\News;
use App\Models\Usuario;
use App\Models\UsuariosPerfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function home()
    {
        $totalUsuarios = Usuario::count();
        $totalCart = CartItem::count();
        $ultimoLibroCargado = Book::latest()->first();

        $facturacionPorMes = CartItem::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(quantity) as total_facturacion')
        )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderByDesc('total_facturacion')
            ->first();

        // Obtener el nombre del mes en español utilizando Carbon
        $nombreMesConMasFacturacion = '';
        if ($facturacionPorMes) {
            $nombreMesConMasFacturacion = Carbon::createFromFormat('!m', $facturacionPorMes->month)
                ->locale('es')
                ->monthName;
        }

        // Obtener el libro más vendido
        $libroMasVendido = CartItem::select('book_id', DB::raw('SUM(quantity) as total_ventas'))
            ->groupBy('book_id')
            ->orderByDesc('total_ventas')
            ->first();

        // Verificar si se encontró el libro más vendido y obtener su nombre
        $nombreLibroMasVendido = '';
        if ($libroMasVendido) {
            $nombreLibroMasVendido = Book::find($libroMasVendido->book_id)->title;
        }

        return view('admin.index', [
            'totalUsuarios' => $totalUsuarios,
            'totalCart' => $totalCart,
            'nombreLibroMasVendido' => $nombreLibroMasVendido,
            'ultimoLibroCargado' => $ultimoLibroCargado,
            'nombreMesConMasFacturacion' => $nombreMesConMasFacturacion,
        ]);
    }

    public function dashboard()
    {
        $books = Book::all();
        return view('admin.dashboard', [
            'books' => $books,
        ]);
    }


    public function dashboardNews()
    {
        $news = News::all();
        return view('admin.dashboardNews', [
            'news' => $news,
        ]);
    }

    public function libroFormNew()
    {
        $usuario = Auth::user();

        return view('admin.formNew', [
            'genres' => Genre::All(),
            'usuario' => $usuario
        ]);
    }

    public function libroRunNew(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();

        $request->validate(Book::validationRules(), Book::validationRulesAlerts());

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImg($request);
        }

        try {
            DB::transaction(function () use ($data) {
                $book = Book::create($data);
                $book->genres()->attach($data['genre_id']);
            });
            return redirect()->route('admin.dashboard')->with('message.success', '¡El libro <b>' . e($data['title']) . '</b> se publicó con éxito!');
        } catch (\Exception $e) {
            return redirect()->route('admin.newForm')->withInput()->with('message.danger', 'El libro <b>' . e($data['title']) . '</b> no pudo publicarse. Inténtelo de nuevo más tarde');
        }
    }


    public function NewFormNew()
    {
        $usuario = Auth::user();

        return view('admin.NewFormNew', [
            'usuario' => $usuario
        ]);
    }

    public function NewRunNew(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();

        $request->validate(News::validationRules(), News::validationRulesAlerts());

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImg($request);
        }

        try {
            DB::transaction(function () use ($data) {
                News::create($data);
            });
            return redirect()->route('admin.dashboardNews')->with('message.success', '¡La novedad <b>' . e($data['title']) . '</b> se publicó con éxito!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()
                ->route('admin.NewFormNew')->withInput()->with('message.danger', 'La novedad <b>' . e($data['title']) . '</b> no pudo publicarse. Inténtelo de nuevo más tarde');
        }
    }


    // funciones de eliminar
    public function deleteBook(int $id)
    {
        return view('admin.deleteBook', [
            'book' => Book::findOrFail($id)
        ]);
    }

    public function deleteAction(int $id)
    {
        $book = Book::findOrFail($id);

        try {
            DB::transaction(function () use ($book) {
                $book->delete();
                $book->genres()->detach();
            });
        } catch (\Exception $e) {
            return redirect()->route('admin.deleteBook', ['id' => $id])->withInput()->with('message.danger', 'El libro <b>' . e($book->title) . '</b> no pudo eliminarse. Por favor, probá de nuevo más tarde.');
        }

        return redirect()->route('admin.dashboard')->with('message.success', '¡El libro <b>' . e($book->title) . '</b> se eliminó con éxito!');
    }

    public function deleteNew(int $id)
    {
        return view('admin.deleteNew', [
            'new' => News::findOrFail($id)
        ]);
    }

    public function deleteActionNew(int $id)
    {
        $new = News::findOrFail($id);

        try {
            DB::transaction(function () use ($new) {
                $new->delete();
            });
        } catch (\Exception $e) {
            return redirect()->route('admin.deleteNew', ['id' => $id])->withInput()->with('message.danger', 'La novedad <b>' . e($new->title) . '</b> no pudo eliminarse. Por favor, probá de nuevo más tarde.');
        }

        return redirect()->route('admin.dashboardNews')->with('message.success', '¡La novedad <b>' . e($new->title) . '</b> se eliminó con éxito!');
    }

    // funciones de editar

    public function editBook(int $id)
    {
        return view('admin.editBook', [
            'book' => Book::findOrFail($id),
            'genres' => Genre::All(),
        ]);
    }

    public function editAction(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $request->validate(Book::validationRules(), Book::validationRulesAlerts());

        $data = $request->except(['_token']);

        $oldImg = $book->img;

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImg($request);
        }

        try {
            DB::transaction(function () use ($book, $data) {
                $book->update($data);
                $book->genres()->sync($data['genre_id'] ?? []);
            });
        } catch (\Exception $e) {
            return redirect()->route('admin.editBook', ['id' => $id])->withInput()->with('message.danger', 'El libro <b>' . e($book->title) . '</b> no pudo eliminarse. Por favor, probá de nuevo más tarde.');
        }

        if ($request->hasFile('img') && Storage::exists('img/' . $oldImg)) {
            Storage::delete('img/' . $oldImg);
        }

        return redirect()->route('admin.dashboard')->with('message.success', '¡El libro <b>' . e($data['title']) . '</b> se editó con éxito!');
    }

    public function editNew(int $id)
    {
        return view('admin.editNew', [
            'new' => News::findOrFail($id)
        ]);
    }

    public function editActionNew(Request $request, int $id)
    {
        $new = News::findOrFail($id);

        $request->validate(News::validationRules(), News::validationRulesAlerts());

        $data = $request->except(['_token']);

        $oldImg = $new->img;

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImg($request);
        }

        try {
            DB::transaction(function () use ($new, $data) {
                $new->update($data);
            });
        } catch (\Exception $e) {
            return redirect()->route('admin.editNew', ['id' => $id])->withInput()->with('message.danger', 'El libro <b>' . e($new->title) . '</b> no pudo eliminarse. Por favor, probá de nuevo más tarde.');
        }

        if ($request->hasFile('img') && Storage::exists('img/' . $oldImg)) {
            Storage::delete('img/' . $oldImg);
        }

        return redirect()->route('admin.dashboardNews')->with('message.success', '¡La novedad <b>' . e($data['title']) . '</b> se editó con éxito!');
    }

    protected function uploadImg(Request $request): string
    {
        $img = $request->file('img');
        $title = $request->input('title');

        $imgName = date('YmdHis_') . \Str::slug($title) . '.' . $img->guessExtension();

        $img->storeAs('img', $imgName);

        return $imgName;
    }


    //Funciones para administrar usuarios: 

    public function listaDeUsuarios()
    {
        $usuarios = UsuariosPerfil::where('roles_id', 2)->get();
        return view('admin.usuarios.listaUsuarios', [
            'usuarios' => $usuarios,
        ]);
    }


    public function findByIdUsuario(int $id)
    {
        $usuario = UsuariosPerfil::findOrFail($id);

        return view('admin.usuarios.usuarioDetalle', [
            'usuario' => $usuario,
            // 'carritos' => $carritos,
        ]);
    }

}