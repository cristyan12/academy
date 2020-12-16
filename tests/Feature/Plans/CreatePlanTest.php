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

        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }

    /** @test */
    public function the_create_plans_screen_can_be_rendered(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->get('plans/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_new_plan(): void
    {
        $response = $this->post('plans', [
            'name' => 'Plan 1',
            'type' => 'Adultos',
            'description' => 'Descripcion del Plan 1',
        ]);

        $plan = Plan::first();
        $this->assertSame('Plan 1', $plan->name);
        $this->assertSame('Adultos', $plan->type);
        $this->assertSame('Descripcion del Plan 1', $plan->description);
    }

    /** @test */
    public function the_name_is_required(): void
    {
        $response = $this->post('plans', [
            'name' => '',
            'type' => 'Adultos',
            'description' => 'Descripcion del Plan 1',
        ])
        ->assertSessionHasErrors();

        $this->assertEquals(0, Plan::count());
    }

    /** @test */
    public function the_type_is_required(): void
    {
        $response = $this->post('plans', [
            'name' => 'Plan 1',
            'type' => '',
            'description' => 'Descripcion del Plan 1',
        ])
        ->assertSessionHasErrors();

        $this->assertEquals(0, Plan::count());
    }

    /** @test */
    public function the_description_is_required(): void
    {
        $response = $this->post('plans', [
            'name' => 'Plan 1',
            'type' => 'Adultos',
            'description' => '',
        ])
        ->assertSessionHasErrors();

        $this->assertEquals(0, Plan::count());
    }
}
