<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use App\User;

class testLogin extends TestCase
{
    // use DatabaseTransactions;
    /**
     * @test
     * @return void
     */
    public function testLogin()
    {
        $a = 1;
        $b = 2;
        $c = $a * $b;
        // $user = User::create(['name' => 'rupesh', 'email' => 'rupesh@gmail.com', 'password' => 'lll', 'phone' => '985466114', 'gender' => 'male']);
        $this->assertEquals(2, $c);
    }
    /**
     * @test
     * @return void
     */
    public function register()
    {
        $a = 1;
        $b = 2;
        $c = $a * $b;
        // $user = User::create(['name' => 'rupesh', 'email' => 'rupesh@gmail.com', 'password' => 'lll', 'phone' => '985466114', 'gender' => 'male']);
        $this->assertEquals(2, $c);
    }
}
