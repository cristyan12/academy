<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletePlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_a_plan(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $plan = Plan::factory()->create();

        $this->actingAs($user);

        $this->delete(route('plans.destroy', $plan))
            ->assertRedirect();

        $this->assertDatabaseMissing('plans', ['id' => $plan->id]);
    }
}
