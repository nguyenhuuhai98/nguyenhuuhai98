<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Test;

class TestModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_lession_relation()
    {
        $test = new Test();
        $relation = $test->lession();

        $this->assertInstanceOf(HasOne::class, $relation);
    }

    public function test_questions_relation()
    {
        $test = new Test();
        $relation = $test->questions();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
    }

    public function test_contains_valid_fillable_properties()
    {
        $test = new Test();
        $this->assertEquals(['lession_id', 'name'], $test->getFillable());
    }
}
