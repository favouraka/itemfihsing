<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class Navigation extends Component
{
    public $listeners = [
        'cart_updated' => 'getCartCountProperty',
    ];

    public function getCartCountProperty()
    {
        return Cart::quantity();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
