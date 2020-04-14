<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Question;

class TestModelQuestion extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_answers_relation()
    {
        $question = new Question();
        $relation = $question->answers();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('question_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_tests_relation()
    {
        $question = new Question();
        $relation = $question->tests();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('test_question.question_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('test_question.test_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $question = new Question();

        $this->assertEquals(['question_id', 'text', 'true_answer'], $question->getFillable());
    }
}
