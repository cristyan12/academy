<?php

namespace Tests\Feature\Profiles;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_be_render_the_index_profiles_view(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get(route('profiles.index', $user))
            ->assertOk()
            ->assertViewIs('profiles.index');
    }

    /** @test */
    public function it_can_be_render_the_create_profiles_view(): void
    {
        $user = User::factory()->create(['name' => '::name::']);
        $this->actingAs($user);

        $response = $this->get(route('profiles.create', $user))
            ->assertOk()
            ->assertViewIs('profiles.create')
            ->assertViewHas('user')
            ->assertSee($user->name);
    }
}
