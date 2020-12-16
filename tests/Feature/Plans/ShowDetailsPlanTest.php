<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowDetailsPlanTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }

    /** @test */
    public function the_show_plans_screen_can_be_rendered(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.show', $plan))
            ->assertStatus(200)
            ->assertViewIs('plans.show')
            ->assertViewHas('plan')
            ->assertSee($plan->name)
            ->assertSee($plan->type)
            ->assertSee($plan->description);
    }
}
