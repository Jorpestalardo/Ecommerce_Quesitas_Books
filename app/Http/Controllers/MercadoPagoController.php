<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\PaymentsProviders\MercadoPagoPayment;
use Auth;
use Illuminate\Http\Request;
use MercadoPago\SDK;
use PHPUnit\Framework\TestStatus\Success;

class MercadoPagoController extends Controller
{

    public function mostrar()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));

        $cart = auth()->user()->cart;

        $payment = new MercadoPagoPayment();

        if ($cart && !$cart->cartItems->isEmpty()) 
        {
            $items = [];

            foreach ($cart->cartItems as $cartItem) {
                $item = new \MercadoPago\Item();
                $item->title = $cartItem->book->title;
                $item->unit_price = $cartItem->book->price;
                $item->quantity = $cartItem->quantity;
                $items[] = $item;
            }

            $payment->addProducts($cart->cartItems)
                ->addBackUrls(
                    success: route('mercadopago.success'),
                    pending: route('mercadopago.pending'),
                    failure: route('mercadopago.failure'),
                )
                ->withAutoReturn()
                ->save();

        return view('cart.index', [
            'payment' => $payment,
            'cart' => $cart,
        ]);
        }
    }

    public function success(Request $request)
    {
        // Obtener el carrito del usuario actual
        $user = Auth::user();
        $cart = $user->cart;
    
        // Verificar si el carrito existe y está activo
        if ($cart && $cart->status === 'active') {
            // Marcar el carrito como completado
            $cart->status = 'active';
            $cart->save();
    
            // Vaciar los elementos del carrito (CartItems)
            $cart->cartItems()->delete();
        }
    
        // Redirigir de vuelta a tu sitio web
        return redirect()->route('home')->with('success', '¡Compra realizada con éxito!');
    }
    public function pending(Request $request)
    {
        return view('mercadopago.pending');
    }
    public function failure(Request $request)
    {
        return view('mercadopago.failure');
    }
}
