<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Word;

class TestModelWord extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_users_relation()
    {
        $word = new Word();
        $relation = $word->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_word.word_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_word.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $word = new Word();

        $this->assertEquals(['lession_id', 'key_word', 'sentence'], $word->getFillable());
        $this->assertEquals([], $word->getVisible());
        $this->assertEquals(['*'], $word->getGuarded());
    }
}
