<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditPlanTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Plan $plan;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->user = User::factory()->create();

        $this->user->plans()->save($this->plan = Plan::factory()->make());

        $this->actingAs($this->user);
    }

    /** @test */
    public function the_edit_plan_screen_can_be_rendered(): void
    {
        $response = $this->get(route('plans.edit', $this->plan));

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_edit_a_plan(): void
    {
        $response = $this->put(route('plans.update', $this->plan), [
            'title' => '::title::',
            'type' => 'avanzado',
            'description' => '::description::',
        ])
        ->assertRedirect();

        $this->assertDatabaseHas('plans', [
            'title' => '::title::',
            'type' => 'avanzado',
            'description' => '::description::',
        ]);
    }
}
