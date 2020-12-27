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
        $this->markTestIncomplete();
        return;
    }
}
