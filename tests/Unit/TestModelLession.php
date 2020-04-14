<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Lession;

class TestModelLession extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_course_relation()
    {
        $lession = new Lession();
        $relation = $lession->course();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('course_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_test_relation()
    {
        $lession = new Lession();
        $relation = $lession->test();

        $this->assertInstanceOf(HasOne::class, $relation);
        $this->assertEquals('lession_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_words_relation()
    {
        $lession = new Lession();
        $relation = $lession->words();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('lession_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_users_relation()
    {
        $lession = new Lession();
        $relation = $lession->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_lession.lession_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_lession.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $lession = new Lession();

        $this->assertEquals(['course_id', 'name', 'description', 'slug'], $lession->getFillable());
    }
}
