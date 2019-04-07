<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testProduct extends TestCase
{
    /** @test  */
    public function addProductWithOutLogin()
    {
        $this->get('store')->assertRedirect('/store/login');
    }
}
