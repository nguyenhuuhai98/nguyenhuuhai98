<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Activity;

class TestModelActivity extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_relation()
    {
        $activity = new Activity();
        $relation = $activity->user();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $activity = new Activity();

        $this->assertEquals(['user_id', 'name', 'description', 'type'], $activity->getFillable());
    }
}
