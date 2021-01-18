<?php

namespace Tests\Feature\Profile;

use App\Models\{Login, Plan, User, UserProfile};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_creation_profile_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/user/profile/create/');

        $response->assertStatus(200)
            ->assertViewIs('profile.create')
            ->assertViewHas('user')
            ->assertSee($user->name)
            ->assertSee($user->email);
    }

    public function test_user_can_register_new_profile(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('user_profiles', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_phone_field_is_required(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_phone_field_mut_contain_max_16_characters(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => 'muchos-caracteres-para-un-numero-de-telefono',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_born_at_field_is_required(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_born_at_field_must_be_a_valid_date(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => 'non-valid-date',
            'country' => '::country::',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_country_field_is_required(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_country_field_must_contain_max_100_characters(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => 'muchos-caracteres-para-el-nombre-de-un-pais-cualquiera-aun-en-español-que-es-mas-largo-que-el-ingles-por-ejemplo',
            'plan_id' => $plan->id,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_plan_id_field_is_required(): void
    {
        $plan = Plan::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => '',
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }

    public function test_plan_id_must_be_exists_in_plans_table(): void
    {
        $plan = Plan::factory()->create(); // id = 1
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/user/profile/', [
            'phone' => '::phone::',
            'born_at' => '2009-11-24 10:22:01',
            'country' => '::country::',
            'plan_id' => 99,
            'user_id' => $user->id,
        ]);

        $response->assertSessionHasErrors();
        $this->assertCount(0, UserProfile::all());
    }
}
