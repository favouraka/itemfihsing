<?php

namespace App\Http\Livewire\Listing;

use Livewire\Component;
use App\Models\Listing;
use App\Facades\Cart;

class Show extends Component
{
    public $listing;

    public function getCartQuantityProperty(): int | null
    {
        return Cart::items()?->get($this->listing->id)?->get('quantity') ;
    }

    public function increase()
    {
        Cart::updateProduct($this->listing->id, 'increase');
        $this->emit('cart_updated');
    }

    public function decrease()
    {
        Cart::updateProduct($this->listing->id, 'decrease');
        $this->emit('cart_updated');
    }

    public function mount(Listing $listing)
    {
        $this->listing = $listing;
    }

    public function render()
    {
        return view('livewire.listing.show')->layout('layouts.theme');
    }
}
