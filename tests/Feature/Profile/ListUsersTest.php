<?php

namespace Tests\Feature\Profile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListUsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_list_of_users_screeen_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/users')
            ->assertStatus(200)
            ->assertViewIs('profile.index')
            ->assertSee($user->name);
    }
}
