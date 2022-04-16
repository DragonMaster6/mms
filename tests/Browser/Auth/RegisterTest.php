<?php

namespace Tests\Browser\Auth;

use App\Models\User;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Auth\Register;

class RegisterTest extends DuskTestCase
{
  use DatabaseMigrations;
  /**
   * @group auth_register
   * Tests the happy path of creating a user 
   *
   * @return void
   */
  public function testRegisterNewUser()
  {
    $this->browse(function (Browser $browser) {
      $user = User::factory()->make();
      $browser
        ->visit(new Register)
        ->submitNewUser($user)
        ->waitFor('#message')
      // Might need to assert for a wait here
        ->assertDatabaseHas('users', [
          'email' => $user->email,
        ])
        ->assertUrlIs('/login')
        ->assertSeeAnythingIn('#message');
      // Assert that the user is redirected to the login page 
    });
  }

  /**
   * @group auth_register
   * Unsure that emails are indeed unique
   *
   * @return void 
   */ 
  public function testRegisterUniqueUsersOnly()
  {
    $this->browse(function(Browser $browser) {
      $existing_user = User::factory()->create();
      $new_user = User::factory()->make(['email' => $existing_user->email]);
      $browser
        ->visit(new Register)
        ->submitNewUser($new_user)
        ->waitFor('@errors')
        ->assertSeeAnythingIn('@error');
    });
  }
}
