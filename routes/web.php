<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MercadoPagoController;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('quienes-somos', [HomeController::class, 'nosotros'])->name('nosotros');

Route::get('novedades', [NewsController::class, 'home'])->name('news.index');

Route::get('admin/home', [AdminController::class, 'home'])->name('admin.index')->middleware(['auth', 'role']);

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', 'role']);
Route::get('admin/dashboardNews', [AdminController::class, 'dashboardNews'])->name('admin.dashboardNews')->middleware(['auth', 'role']);

Route::get('iniciar-sesion', [AuthController::class, 'login'])->name('auth.login');
Route::post('iniciar-sesion', [AuthController::class, 'loginAction'])->name('auth.loginAction');

Route::get('registro', [AuthController::class, 'register'])->name('auth.register');
Route::post('registro', [AuthController::class, 'registerAction'])->name('auth.registerAction');

Route::post('cerrar-sesion', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('libros', [BooksController::class, 'allBooks'])->name('libros.index');
Route::get('admin/dashboard/libros/nuevo', [AdminController::class, 'libroFormNew'])->name('admin.formNew')->middleware(['auth', 'role']);

Route::post('admin/dashboard/libros/nuevo', [AdminController::class, 'libroRunNew'])->name('admin.runNew')->middleware(['auth', 'role']);


Route::get('admin/dashboardNews/novedades/nuevo', [AdminController::class, 'NewFormNew'])->name('admin.NewFormNew')->middleware(['auth', 'role']);

Route::post('admin/dashboardNews/novedades/nuevo', [AdminController::class, 'NewRunNew'])->name('admin.NewRunNew')->middleware(['auth', 'role']);




Route::get('libros/{id}', [BooksController::class, 'findById'])->name('libros.detalle')->whereNumber('id');

Route::get('novedades/{id}', [NewsController::class, 'newById'])->name('news.detalle')->whereNumber('id');


//crear todo referido a novedades:
Route::get('admin/dashboardNews/novedades/{id}/eliminar', [AdminController::class, 'deleteNew'])->name('admin.deleteNew')->whereNumber('id')->middleware(['auth', 'role']);

Route::post('admin/dashboardNews/novedades/{id}/eliminar', [AdminController::class, 'deleteActionNew'])->name('admin.deleteActionNew')->whereNumber('id')->middleware(['auth', 'role']);

Route::get('admin/dashboardNews/novedades/{id}/editar', [AdminController::class, 'editNew'])->name('admin.editNew')->whereNumber('id')->middleware(['auth', 'role']);

Route::post('admin/dashboardNews/novedades/{id}/editar', [AdminController::class, 'editActionNew'])->name('admin.editActionNew')->whereNumber('id')->middleware(['auth', 'role']);



//crear todo referido a libros: 
Route::get('admin/dashboard/libros/{id}/eliminar', [AdminController::class, 'deleteBook'])->name('admin.deleteBook')->whereNumber('id')->middleware(['auth', 'role']);

Route::post('admin/dashboard/libros/{id}/eliminar', [AdminController::class, 'deleteAction'])->name('admin.deleteAction')->whereNumber('id')->middleware(['auth', 'role']);

Route::get('admin/dashboard/libros/{id}/editar', [AdminController::class, 'editBook'])->name('admin.editBook')->whereNumber('id')->middleware(['auth', 'role']);

Route::post('admin/dashboard/libros/{id}/editar', [AdminController::class, 'editAction'])->name('admin.editAction')->whereNumber('id')->middleware(['auth', 'role']);

//Todo referido a usuarios:

Route::get('admin/dashboard/usuarios/', [AdminController::class, 'listaDeUsuarios'])->name('admin.usuarios.listaUsuarios')->middleware(['auth', 'role']);

Route::get('admin/dashboard/usuarios/{id}', [AdminController::class, 'findByIdUsuario'])->name('admin.usuarios.usuarioDetalle')->whereNumber('id')->middleware(['auth', 'role']);


//MI PERFIL usuario: 
Route::get('perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil')->middleware(['auth']);

Route::get('perfil/editar/{id}', [UsuarioController::class, 'editarPerfil'])->name('usuario.editarPerfil')->whereNumber('id')->middleware(['auth']);

Route::post('perfil/editar/{id}', [UsuarioController::class, 'editarPerfilAction'])->name('usuario.editarPerfilAction')->whereNumber('id')->middleware(['auth']);


Route::get('mp/test', [MercadoPagoController::class, 'mostrar']);

Route::get('mp/success', [MercadoPagoController::class, 'success'])->name('mercadopago.success');
Route::get('mp/pending', [MercadoPagoController::class, 'pending'])->name('mercadopago.pending');
Route::get('mp/failure', [MercadoPagoController::class, 'failure'])->name('mercadopago.failure');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware(['auth']);
Route::get('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware(['auth']);
Route::post('/cart/add', [CartController::class, 'addToCartAction'])->name('cart.addAction')->middleware(['auth']);
Route::get('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware(['auth']);
Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCartAction'])->name('cart.removeAction')->middleware(['auth']);
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear')->middleware(['auth']);
Route::put('/cart/update-preference', [CartController::class, 'updatePreference'])->name('cart.updatePreference')->middleware(['auth']);



Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware(['auth']);
Route::post('/cart/checkout', [CartController::class, 'confirmCheckout'])->name('cart.confirmCheckout')->middleware(['auth']);