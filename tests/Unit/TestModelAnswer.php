<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Answer;

class TestModelAnswer extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_question_relation()
    {
        $answers = new Answer();
        $relation = $answers->question();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('question_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $answers = new Answer();

        $this->assertEquals(['question_id', 'text', 'true_answer',], $answers->getFillable());
    }
}
