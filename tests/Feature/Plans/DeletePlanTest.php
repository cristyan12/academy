<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeletePlanTest extends TestCase
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
    public function a_user_can_delete_given_plan(): void
    {
        $this->withoutExceptionHandling();

        $plan = Plan::factory()->create();

        $response = $this->delete(route('plans.destroy', $plan));

        $this->assertCount(0, Plan::all());
    }
}
