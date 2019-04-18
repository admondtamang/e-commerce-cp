<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Cart;
use App\Shipping;
use App\Order;

class testLogin extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function homePage()
    {
        $this->GET('/')->assertSee('user login');
    }

    /** @test */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }

    /** @test */
    public function register()
    {
        $user = factory(User::class)->make();
        $this->assertEquals('94594848449', $user->phone);
    }

    /** @test */
    public function updateProfile()
    {
        $response = $this->call('PUT', '/profile/1', [
            'name' => "anish",
            'password' => "password",
            'gender' => "Male",
            'address' => "Kirtipur",
            'phone' => "9811111111",
            'email' => "anishbudathoki@gmail.com",
        ]);

        $this->assertEquals(302, $response->status());
    }

    /** @test */
    public function addToCart()
    {
        $cart = Cart::create([
            'product_id' => 1,
            'name' => 'goldstar',
            'price' => 400,
            'quantity' => 5,
            'stock' => 100,
            'session_id' => 'VgbBrcq9GTi710WowLdrhs6oQHLRP9C6uC7k9Mfr'
        ]);

        $this->assertEquals('goldstar', $cart->name);
    }


    /** @test */
    public function orderProduct()
    {
        $order = Order::create([
            'user_id' => 1,
            'product_id' => 2,
            'order_date' => '2019-04-07 17:05:53',
            'name' => 'lukas',
            'email' => 'allen@gmail.com',
            'address' => 'balaju',
            'postal_code' => 45545,
            'phone' => '5655988998',
            'status' => 0,
            'payment' => 'cod'
        ]);
        $this->assertEquals('lukas', $order->name);
    }

    /** @test */
    public function addShipping()
    {
        $ship = Shipping::create([
            'name' => 'Allen',
            'email' => 'allen@gmail.com',
            'address' => 'balaju',
            'postal_code' => 45545,
            'phone' => '5655988998',
            'user_id' => 2
        ]);
        $this->assertEquals('Allen', $ship->name);
    }
}
