<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Cart extends Facade {
    protected static function getFacadeAccessor()
    {
        return \App\Service\CartService::class;
    }
}
