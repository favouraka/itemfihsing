<?php

namespace App\Http\Livewire\Listing;

use Livewire\Component;
use App\Facades\Cart;
use App\Models\Listing;
use Livewire\WithPagination;

class ProductGrid extends Component
{
    public $page = 1;
    public $search = '';
    public $category = '';
    public $sort = '';
    
    protected $queryString = [
        'page' => ['except' => 1],
        'category' => ['except' => ''],
        'search' => ['except' => ''],
        'sort' => ['except' => ''],
    ];

    public function getListingsProperty()
    {
        return Listing::when($this->search , function($query, $search){
            $query->where('name','like','%'.$search.'%');
        })->when($this->category, function($query, $category){
            $query->whereHas('category', function($query)use($category){
                $query->where('name','category');
            });
        })->paginate(30);
    }

    public function showCount($item)
    {
        return Cart::items()?->get($item['id'])?->get('quantity');
    }

    public function addProduct(Listing $item)
    {
        // dd($item);
        Cart::addProduct($item);
        $this->emit('cart_updated');
    }

    public function updateQuantity($item, $quantity)
    {
        Cart::updateProduct(item: $item, action: '' , quantity: $quantity);
        $this->emit('cart_updated');
        return true;
    }

    public function increment( $item)
    {
        Cart::updateProduct($item, 'increase');
        $this->emit('cart_updated');
    }

    public function decrease($item)
    {
        Cart::updateProduct($item, 'decrease');
        $this->emit('cart_updated');
    }

    public function render()
    {
        return view('livewire.listing.product-grid');
    }
}
