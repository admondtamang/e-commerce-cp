<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class testProduct extends TestCase
{
    /** @test  */
    public function addProductWithOutLogin()
    {
        $this->get('store')->assertRedirect('/store/login');
    }
    
    /** @test */
    public function search()
    {
        $search_name = '';
        $product = Product::where('name', 'like', '%' . $search_name . '%')->get();
        $this->assertEmpty($product);
    }

    /** @test */

    public function addProduct()
    {
        $product = Product::create([

            'name' => 'adidas',
            'description' => 'shoe',
            'price' => '1000',
            'image' => 'sdfkl.jpg',
            'stock_quantity' => '5',
            'category_id' => '1',
            'store_id' => '1',
        ]);

        $this->assertEquals('adidas', $product->name);
    }

    /** @test */

    public function testProductDelete()
    {
        $response = $this->call('DELETE', 'store/products/1');

        $this->assertEquals(302, $response->status());
    }
}
