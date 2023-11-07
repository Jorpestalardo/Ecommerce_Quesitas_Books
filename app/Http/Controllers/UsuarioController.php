<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\UsuariosPerfil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function perfil()
    {
        $usuario = Auth::user();
        $carritosCompletados = Cart::where('user_id', $usuario->user_id)
            ->where('status', 'active')
            ->with('cartItems.book')
            ->get();
    
        return view('usuario.perfil', [
            'usuario' => $usuario,
            'carritosCompletados' => $carritosCompletados,
        ]);
    }
    

    public function editarPerfil(int $id)
    {
        return view('usuario.editarPerfil', [
            'usuario' => UsuariosPerfil::findOrFail($id),
        ]);
    }

    public function editarPerfilAction(Request $request, int $id)
    {
        $usuario = UsuariosPerfil::findOrFail($id);

        $data = $request->except(['_token']);

        $oldImg = $usuario->img;

        if ($request->hasFile('img')) {
            $data['img'] = $this->uploadImg($request);
        }

        if ($request->hasFile('img') && Storage::exists('img/' . $oldImg)) {
            Storage::delete('img/' . $oldImg);
        }

        try {
            DB::transaction(function () use ($usuario, $data) {
                $usuario->update($data);
            });
        } catch (\Exception $e) {
            return redirect()->route('usuario.perfil')->with('message.danger', '<b>' . e($data['nombre']) . '</b> no pudo editarse correctamente. Inténtelo más tarde');
        }

        return redirect()->route('usuario.perfil')->with('message.success', '¡<b>' . e($data['nombre']) . '</b> se editó con éxito tu perfil!');
    }


    protected function uploadImg(Request $request): string
    {
        $img = $request->file('img');
        $nombre = $request->input('nombre');

        $imgName = date('YmdHis_') . \Str::slug($nombre) . '.' . $img->guessExtension();

        $img->storeAs('img', $imgName);

        return $imgName;

    }
}