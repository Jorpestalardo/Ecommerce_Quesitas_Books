<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\PaymentsProviders\MercadoPagoPayment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;


class CartController extends Controller
{
    public function index()
    {
        // Obtener el carrito asociado al usuario autenticado
        $cart = auth()->user()->cart;
        // Verificar si la carrito existe
        if ($cart) {
            // Verificar si la preferencia de Mercado Pago ya existe
            if (!$cart->preference_id) {
                // Si no existe, crear una preferencia nueva con un carrito vacío
                $payment = new MercadoPagoPayment();
                $payment->save(); // Esto creará una nueva preferencia y la asociará al carrito
                $cart->preference_id = $payment->getPreferenceId();
                $cart->save();
            } else {
                $payment = new MercadoPagoPayment($cart->preference_id);
            }

            $payment->addProducts($cart->cartItems);

            return view('cart.index', compact('cart', 'payment'));
        } else {
            // Si el carrito no existe, pasamos una instancia vacía
            $cart = new Cart(); // Asumiendo que tienes el modelo Cart importado
            $payment = new MercadoPagoPayment(); // Creamos una instancia vacía del pago

            return view('cart.index', compact('cart', 'payment'));
        }
    }




    public function addToCart()
    {
        $cart = auth()->user()->cart;
        return view('cart.index');
    }

    public function addToCartAction(Request $request)
    {
        // Obtener el ID del libro y la cantidad desde el formulario
        $book_id = $request->input('book_id');
        $quantity = $request->input('quantity');

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario ya tiene un carrito
        if ($user->cart) {
            // Si el usuario ya tiene un carrito, simplemente agregamos el libro al carrito existente
            $cart = $user->cart;
        } else {
            // Si el usuario no tiene un carrito, creamos uno nuevo y asociamos el user_id
            $cart = new Cart(['user_id' => $user->id]);
            $user->cart()->save($cart);
        }

        // Agregar el libro al carrito actual
        $cartItem = new CartItem([
            'book_id' => $book_id,
            'quantity' => $quantity,
        ]);
        $cart->cartItems()->save($cartItem);

        return redirect()->route('cart.index')->with('success', 'Libro agregado al carrito.');
    }


    public function removeFromCart()
    {
        $cart = auth()->user()->cart;
        return view('cart.index');
    }


    public function removeFromCartAction($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);

        // Verificar si el carrito pertenece al usuario autenticado para evitar eliminaciones no autorizadas
        if (auth()->user()->cart->cart_id !== $cartItem->cart_id) {
            abort(403, 'Unauthorized action.');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Libro eliminado del carrito.');
    }

    public function clearCart()
    {
        // Obtener el carrito actual del usuario autenticado (asumiendo que ya tienes la autenticación configurada)
        $cart = auth()->user()->cart;

        // Vaciar el carrito eliminando todos los elementos del mismo
        $cart->cartItems()->delete();

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }


    public function checkout()
    {
        $cart = auth()->user()->cart;

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        $payment = new MercadoPagoPayment();
        $payment->addProducts($cart->cartItems)
            ->addBackUrls(
                success: route('mercadopago.success'),
                pending: route('mercadopago.pending'),
                failure: route('mercadopago.failure'),
            )
            ->withAutoReturn()
            ->save();

        $total = $payment->getTotal();

        // Cambiar el estado del carrito a "completed" o algún otro estado adecuado
        $cart->status = 'active';
        $cart->save();

        return view('cart.checkout', compact('cart', 'total', 'payment'));
    }

    public function confirmCheckout()
    {
        $cart = auth()->user()->cart;

        if ($cart && !$cart->cartItems->isEmpty()) {
            $payment = new MercadoPagoPayment();
            $payment->addProducts($cart->cartItems)
                ->save();
            // Vaciar el carrito
            $cart->cartItems()->delete();

            return redirect()->route('mercadopago.success')->with('success', '¡Compra realizada con éxito!');
        }

        return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
    }

    public function updatePreference()
    {
        $cart = auth()->user()->cart;

        if ($cart && !$cart->cartItems->isEmpty()) {
            $payment = new MercadoPagoPayment();
            $payment->addProducts($cart->cartItems)
                ->withAutoReturn()
                ->save();
        }

        return redirect()->route('libros.index')->with('success', '¡Se vació el carrito con éxito!');
    }

    private function createEmptyPreference(Cart $cart)
    {
        // Crear una preferencia vacía con Mercado Pago y asignar el ID de preferencia al carrito
        SDK::setAccessToken(config('mercadopago.access_token'));
        $preference = new Preference();
        $preference->items = [new Item()];
        $preference->save();

        $cart->preference_id = $preference->id;
        $cart->save();
    }

}