<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WhithoutMiddelware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWhithDatabase;


class UserTest extends TestCase
{   
   Use DatabaseTransactions;
 //  Use InteractsWhithDatabase;

    public function testCanSeeUserPage()
    {   
        $user = factory(User::class)->create();
        $response = $this->get($user->username);
        $response->assertSee($user->username);
    }
/*
    public function testCanLogin()
    {
        $user = factory(User::class)->create();
        
        $response = $this->post('/login',[
            'email' =>$user->email,
            'password'=>'secret',
        ]);

        $this->seeIsAuthenticatedAs($user);
    }*/

    public function testCanFollow()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        $response = $this->actingAs($user)->post($other->username.'/follow');
        $this->assertDatabaseHas('followers',[//revisa la db -- tabla, columnas
            'user_id'=>$user->id,
            'followed_id'=>$other->id
        ]);
    }
}
