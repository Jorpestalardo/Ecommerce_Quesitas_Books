<?php

namespace App\PaymentsProviders;

use App\Models\CartItem;
use Illuminate\Support\Collection;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoPayment
{
    private Preference $preference;
    private array $items = [];
    private string $publicKey;
    private array $backUrls = [];
    private bool $withAutoReturn = false;
    private ?string $preferenceId;

    public function __construct(?string $preferenceId = null)
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
        $this->publicKey = config('mercadopago.public_key');
        $this->preference = new Preference();
        $this->preferenceId = $preferenceId;
    }

    public function addProduct(CartItem $cartItem): self
    {
        $item = new Item();

        $book = $cartItem->book;

        $item->id = $book->book_id;
        $item->title = $book->title;
        $item->quantity = $cartItem->quantity;
        $item->unit_price = $book->price;
        $this->items[] = $item;

        return $this;
    }

    public function addProducts(array|Collection $items): self
    {
        foreach ($items as $item) {
            $this->addProduct($item);
        }

        return $this;
    }

    public function addBackUrls(?string $success = null, ?string $pending = null, ?string $failure = null): self
    {
        if($success !== null) $this->backUrls["success"] = $success;
        if($pending !== null) $this->backUrls["pending"] = $pending;
        if($failure !== null) $this->backUrls["failure"] = $failure;
        
        return $this;
    }

    public function withAutoReturn(): self
    {
        $this->withAutoReturn = true;
        return $this;
    }


    public function save(): self
    {
        if ($this->preferenceId) {
            $this->preference = Preference::find_by_id($this->preferenceId);
        }

        $this->preference->items = $this->items;
        $this->preference->back_urls = $this->backUrls;
        if ($this->withAutoReturn)$this->preference->auto_return = 'approved';

        $this->preference->save();

        $cart = auth()->user()->cart;

        if ($cart) {
            $cart->status = 'active';
            $cart->save();
        }

        return $this;
    }
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getPreferenceId(): string
    {
        return $this->preference->id ?? '';
    }
    public function getTotal(): float
    {
        $this->save();

        $total = 0;
        foreach ($this->preference->items as $item) {
            $total += $item->quantity * $item->unit_price;
        }

        return $total;
    }

}