<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_function_login_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->type('email', 'hai@gmail.com')
                    ->type('password', '123@123')
                    ->click('#signin')
                    ->assertPathIs('/login');
        });
    }

    public function test_function_login_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->type('email', 'hai@gmail.com')
                    ->type('password', 'Huuhai12')
                    ->click('#signin')
                    ->assertPathIs('/home');
        });
    }
}
