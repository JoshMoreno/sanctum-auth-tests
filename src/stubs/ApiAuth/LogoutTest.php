<?php

namespace Tests\Feature\ApiAuth;

use App\User;

class LogoutTest extends ApiAuthTestCase
{
    /** @test */
    public function userCanLogout()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $response = $this->postJson($this->logoutRoute);

        $response->assertStatus(204);
        $this->assertGuest();
    }
}
