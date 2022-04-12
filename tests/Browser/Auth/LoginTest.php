<?php

namespace Tests\Browser\Auth;

use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\Login;

class LoginTest extends DuskTestCase {
  use DatabaseMigrations;

  private $user;

  public function setUp(): void {
    parent::setUp();
    // $this->user = factory(User::class)->create();
    $this->user = User::factory()->create();
  }

  /**
   * @group auth
   * A Dusk test example.
   *
   * @return void
   */
  public function testLogUserIn()
  {
  $this->browse(function (Browser $browser) {
    $browser->visit(new Login())
      ->loginWith($this->user->email, 'password')
      ->waitFor('#dashboard-title')
      ->assertRouteIs('dashboard');

    });
  }

  /**
   * @group auth 
   * Test a failed login scenario
   *
   * @return void 
   */ 
  public function testFailedLogin() {
    $this->browse(function(Browser $browser) {
      $browser->visit(new Login())
        ->loginWith('Rumple@example.com', 'asdf')
        ->waitFor('#login-msg')
        ->assertSeeIn('#login-msg', 'Access Denied');
    });
  }

  /**
   * @group auth 
   * Test registering a user up for the site
   *
   * @return void 
   */ 
  public function testRegisterNewUser() {

  }
}
