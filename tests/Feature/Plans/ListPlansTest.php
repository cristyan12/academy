<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListPlansTest extends TestCase
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
    public function list_plans_screen_can_be_rendered(): void
    {
        $response = $this->get(route('plans.index'))
            ->assertStatus(200)
            ->assertViewIs('plans.index');
    }
}
