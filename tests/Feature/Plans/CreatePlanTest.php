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

        // $this->withoutExceptionHandling();

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
    // public function a_user_can_store_a_new_plan(): void
    // {
    //     $response = $this->post(route('plans.store', [
    //         'title' => '::title::',
    //         'type' => 'avanzado',
    //         'description' => '::description::',
    //     ]));

    //     $this->assertDatabaseHas('plans', [
    //         'title' => '::title::',
    //         'type' => 'avanzado',
    //         'description' => '::description::',
    //     ]);
    // }

    /** @test */
    // public function a_plan_cannot_be_stored_with_empty_field_title(): void
    // {
    //     $response = $this->post(route('plans.store', [
    //         'title' => '',
    //         'type' => 'avanzado',
    //         'description' => '::description::',

    //     ]))
    //     ->assertSessionHasErrors();

    //     $this->assertDatabaseMissing('plans', [
    //         'type' => 'avanzado',
    //         'description' => '::description::',
    //     ]);
    // }

    /** @test */
    // public function a_plan_cannot_be_stored_with_empty_field_type(): void
    // {
    //     $response = $this->post(route('plans.store', [
    //         'title' => '::title::',
    //         'type' => '',
    //         'description' => '::description::',
    //     ]))
    //     ->assertSessionHasErrors();

    //     $this->assertDatabaseMissing('plans', [
    //         'title' => '::title::',
    //         'description' => '::description::',
    //     ]);
    // }

    /** @test */
    // public function a_plan_cannot_be_stored_with_wrong_field_type(): void
    // {
    //     $response = $this->post(route('plans.store', [
    //         'title' => '::title::',
    //         'type' => 'wrong-type',
    //         'description' => '::description::',
    //     ]))
    //     ->assertSessionHasErrors();

    //     $this->assertDatabaseMissing('plans', [
    //         'title' => '::title::',
    //         'description' => '::description::',
    //     ]);
    // }

    /** @test */
    // public function a_plan_cannot_be_stored_with_empty_field_description(): void
    // {
    //     $response = $this->post(route('plans.store', [
    //         'title' => '::title::',
    //         'type' => 'avanzado',
    //         'description' => '',
    //     ]))
    //     ->assertSessionHasErrors();

    //     $this->assertDatabaseMissing('plans', [
    //         'title' => '::title::',
    //         'type' => 'avanzado',
    //     ]);
    // }
}
