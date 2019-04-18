<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
// use App\User;

class testRegister extends TestCase
{
    use DatabaseTransactions;
    /**
     ** @test
     * @return void
     */
    // public function register()
    // {
    //     $this->visit('/register')
    //         ->type('Taylor', 'name')
    //         ->type('taylor@gmail.com', 'email')
    //         ->select('male')
    //         ->type('password', 'password')
    //         ->type('985552445', 'phone')
    //         ->press('submit')
    //         ->seePageIs('/');
    // }
}
