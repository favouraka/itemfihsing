<?php

namespace App\Service;

use Error;
use Illuminate\Session\SessionManager;

class CartService {
    protected $session;

    const DEFAULT_CART = 'product-cart';
    const MINIMUM_QUANTITY = 1;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function clear()
    {
        $this->session->put([]);
    }

    /**
     * Adds an item to the cart
     * @param int $item
     * @param int $quantity
     * 
     * return void
     */
    public function addProduct($item)
    {
        // check qty
        $cart_item = collect($item);
        // 
       if ($cart_item->get('quantity') < 1)
       {
           $cart_item->put('quantity', self::MINIMUM_QUANTITY);
       } 
        //if it exists add quantity
        //    
       $cart = $this->items()->put($cart_item->get('id'), $cart_item);
        //    
       $this->session->put(self::DEFAULT_CART, $cart);//
    }

    public function updateProduct($item, $action = '', $quantity = 1)
    {
        if($this->items()->has($item)){
            // 
            $cart_item = $this->items()->get($item);
            // 
            switch ($action) {
                case 'decrease':
                    # code...
                    $updatedQty = $cart_item->get('quantity') - 1;
                    if ($updatedQty >= self::MINIMUM_QUANTITY) {
                        # remove from cart
                        $cart_item->put('quantity', $updatedQty);
                    } else {
                        $this->removeProduct($item);
                    }
                    break;
                
                case 'increase':
                    # code...
                    $cart_item->put('quantity', $cart_item->get('quantity') + $quantity);
                    break;
                
                default:
                    $cart_item->put('quantity', $quantity);
                    break;

            }
            // update cart item
            $this->items()->put($item, $cart_item);

            $this->session->put(self::DEFAULT_CART,$this->items());
        }
    }

    public function items()
    {
        $products = $this->session->has(self::DEFAULT_CART) ? $this->session->get(self::DEFAULT_CART) : collect([]);
        // return lists
        return collect($products);
    }

    public function count()
    {
        return $this->items()->count();
    }

    public function removeProduct($id)
    {
        $this->session->put(self::DEFAULT_CART,$this->items()->except($id));
    }

    public function quantity()
    {
        if($this->items())
        {
            return $this->items()->sum('quantity');
        } else {
            return 0;
        }
    }

    public function total()
    {
        return $this->items()->sum(function($q){
            return $q->get('unit_price') * $q->get('quantity');
        });
    }
}