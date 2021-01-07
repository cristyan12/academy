<?php

namespace Tests\Feature\Profiles;

use App\Models\{Plan, User, UserProfile};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_save_its_profile(): void
    {
        $this->withoutExceptionHandling();

        $plan = Plan::factory()->create();

        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('profiles.store'), [
            'name' => '::name::',
            'email' => '::email::',
            'date_of_birth' => '2001-12-02',
            'phone' => '::phone::',
            'last_access' => '2020-12-02',
            'country' => '::country::',
            'plan_id' => $plan->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('user_profiles', [
            'date_of_birth' => '2001-12-02',
            'phone' => '::phone::',
            'last_access' => '2020-12-02',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_a_user_can_edit_its_profile(): void
    {
        $this->withoutExceptionHandling();

        $plan = Plan::factory()->create();
        $user = User::factory()->create();
        $user->profile()->save(UserProfile::factory()->make());

        $this->actingAs($user);

        $response = $this->put('/update-profile/', [
            'name' => '::name::',
            'email' => '::email::',
            'date_of_birth' => '2001-12-02',
            'phone' => '::phone::',
            'last_access' => '2020-12-02',
            'country' => '::country::',
            'plan_id' => $plan->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'name' => '::name::',
            'email' => '::email::',
        ]);

        $this->assertDatabaseHas('user_profiles', [
            'date_of_birth' => '2001-12-02',
            'phone' => '::phone::',
            'last_access' => '2020-12-02',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);
    }
}
