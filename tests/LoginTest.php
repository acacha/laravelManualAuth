<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    public function testLoginPageShowsLoginForm()
    {
        $this->visit('/login')
            ->see('Email')
            ->see('Password')
        ;
    }

    protected function createTestUser() {
        return factory(App\User::class)->create(['password' => bcrypt('123456')]);
    }

    public function testLoginPostWithUserOk()
    {
        $user = $this->createTestUser();
        $this->visit('/login')
            ->type($user->email, 'email' )
            ->type('123456','password')
            ->press('login')
            ->seePageIs('/home');
    }

    public function testLoginPostWithUserNotOk()
    {
        $this->visit('/login')
            ->type('pepitopalotes@gmail.com', 'email' )
            ->type('123456','password')
            ->press('login')
            ->seePageIs('/login');
//            ->see('Username not exists');
    }
}