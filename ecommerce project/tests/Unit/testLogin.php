<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

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
        // $user=Us
    }
}
