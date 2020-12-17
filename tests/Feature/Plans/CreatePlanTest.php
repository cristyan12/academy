<?php

namespace Tests\Feature\Plans;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePlanTest extends TestCase
{
    /** @test */
    public function create_plan_screen_can_be_rendered(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/plans/create');

        $response->assertStatus(200);
    }
}
