<?php

namespace Tests\Browser\Pages\Auth;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class Login extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
          '@username' => 'input#username',
          '@password' => 'input[type=password]#secret',
          '@login-btn' => 'button#login-btn'
        ];
    }

    /**
     * Fills in the login form and submits the results
     * 
     * @param Browser $browser 
     * @param string $username
     * @param string $password 
     */ 
    public function loginWith(Browser $browser, $username, $password) {
      $browser->type('@username', $username)
        ->type('@password', $password)
        ->click('@login-btn');
    }
}
