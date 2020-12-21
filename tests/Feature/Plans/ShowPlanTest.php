<?php

namespace Tests\Feature\Plans;

use App\Models\{Plan, User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ShowPlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_show_view_of_details_of_plans_can_be_rendered(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $user->plans()->save($plan = Plan::factory()->make([
            'title' => '::title::',
            'type' => 'adultos',
            'description' => '::description::',
        ]));

        $response = $this->actingAs($user)->get(route('plans.show', $plan))
            ->assertStatus(200)
            ->assertViewIs('plans.show')
            ->assertViewHas('plan')
            ->assertSeeInOrder([
                $plan->title,
                Str::title($plan->type),
                $plan->updated_at->diffForHumans(),
                $plan->description,
                $plan->user->name,
            ]);
    }
}
