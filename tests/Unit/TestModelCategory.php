<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Category;

class TestModelCategory extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_course_relation()
    {
        $category = new Category();
        $relation = $category->courses();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('cate_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $category = new Category();

        $this->assertEquals(['name', 'parent_id', 'slug'], $category->getFillable());
    }
}
