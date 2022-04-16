<?php

namespace Tests\Browser\Pages\Auth;

use App\Models\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class Register extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/register';
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
            '@error' => '#errors',
            '@username' => '#username',
            '@firstname' => '#first-name',
            '@lastname' => '#last-name',
            '@email' => '#email',
            '@password' => '#password',
            '@password-confirm' => '#pass-confirm',
            '@create-btn' => '#create-user',
        ];
    }

    public function submitNewUser(Browser $browser, User $random_user) {
        $browser->type('@username', $random_user->name)
          ->type('@firstname', $random_user->first_name)
          ->type('@lastname', $random_user->last_name)
          ->type('@email', $random_user->email)
          ->type('@password', 'password')
          ->type('@password-confirm', 'password')
          ->click('@create-btn');

    }
}
