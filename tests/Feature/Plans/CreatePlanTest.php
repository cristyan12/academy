<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePlanTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }

    /** @test */
    public function create_plan_screen_can_be_rendered(): void
    {
        $response = $this->get(route('plans.create'));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_store_a_new_plan(): void
    {
        $response = $this->post(route('plans.store', [
            'title' => '::title::',
            'description' => '::description::',
            'user_id' => $this->user->id,
        ]))
        ->assertRedirect(route('plans.index'));

        $this->assertDatabaseHas('plans', [
            'title' => '::title::',
            'description' => '::description::',
            'user_id' => $this->user->id,
        ]);
    }
}
