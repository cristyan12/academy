<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditPlanTest extends TestCase
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
    public function the_edit_plans_screen_can_be_rendered(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.edit', $plan))
            ->assertStatus(200)
            ->assertViewIs('plans.edit')
            ->assertViewHas('plan');
    }

    /** @test */
    public function a_user_can_update_a_plan(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->put(route('plans.update', $plan), [
            'name' => 'Plan actualizado',
            'type' => 'Adolescentes',
            'description' => 'Descripción del plan actualizado',
        ]);

        $plan = Plan::first();
        $this->assertSame('Plan actualizado', $plan->name);
        $this->assertSame('Adolescentes', $plan->type);
        $this->assertSame('Descripción del plan actualizado', $plan->description);
    }

    /** @test */
    public function the_name_is_required_when_updating(): void
    {
        $plan = Plan::factory()->create(['name' => '::name::']);

        $response = $this->put(route('plans.update', $plan), [
            'name' => '',
            'type' => 'Adultos',
            'description' => 'Descripcion del Plan 1',
        ])
        ->assertSessionHasErrors();

        $this->assertSame('::name::', $plan->name);
    }

    /** @test */
    public function the_type_is_required_when_updating(): void
    {
        $plan = Plan::factory()->create(['type' => 'Adolescentes']);

        $response = $this->put(route('plans.update', $plan), [
            'name' => 'Plan',
            'type' => '',
            'description' => 'Descripcion del Plan 1',
        ])
        ->assertSessionHasErrors();

        $this->assertSame('Adolescentes', $plan->type);
    }

    /** @test */
    public function the_description_is_required_when_updating(): void
    {
     $plan = Plan::factory()->create(['description' => 'Descripcion del Plan 1']);

        $response = $this->put(route('plans.update', $plan), [
            'name' => 'Plan',
            'type' => 'Adolescentes',
            'description' => '',
        ])
        ->assertSessionHasErrors();

        $this->assertSame('Descripcion del Plan 1', $plan->description);
    }
}
