<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Course;

class TestModelCourse extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_category_relation()
    {
        $course = new Course();
        $relation = $course->category();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('cate_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function test_lessions_relation()
    {
        $course = new Course();
        $relation = $course->lessions();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('course_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_users_relation()
    {
        $course = new Course();
        $relation = $course->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('user_course.course_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('user_course.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $course = new Course();

        $this->assertEquals(['cate_id', 'name', 'slug'], $course->getFillable());
    }
}
