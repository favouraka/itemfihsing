<?php

namespace Tests\Feature\Cart;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowsCart extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shows_cart_page()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
    }
}
