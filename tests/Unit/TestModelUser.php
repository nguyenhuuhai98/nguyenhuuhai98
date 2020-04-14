<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class TestModelUser extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_activities_relation()
    {
        $user = new User();
        $relation = $user->activities();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('id', $relation->getLocalKeyName());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_followOtherUsers_relation()
    {
        $user = new User();
        $relation = $user->followOtherUsers();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('follows.user_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('follows.user_follow_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_otherUsersFollow_relation()
    {
        $user = new User();
        $relation = $user->otherUsersFollow();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('follows.user_follow_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('follows.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_role_relation()
    {
        $user = new User();
        $relation = $user->role();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('id', $relation->getOwnerKeyName());
        $this->assertEquals('role_id', $relation->getForeignKeyName());
    }

    public function test_lessions_relation()
    {
        $user = new User();
        $relation = $user->lessions();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_lession.user_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_lession.lession_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_courses_relation()
    {
        $user = new User();
        $relation = $user->courses();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_course.user_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_course.course_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_words_relation()
    {
        $user = new User();
        $relation = $user->words();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_word.user_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_word.word_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_properties()
    {
        $user = new User();

        $this->assertEquals(['name', 'email', 'password', 'phone', 'avatar', 'role_id', 'address', 'birthday'], $user->getFillable());
        $this->assertEquals(['password', 'remember_token'], $user->getHidden());
        $this->assertEquals([], $user->getVisible());
        $this->assertEquals(['*'], $user->getGuarded());
    }
}
