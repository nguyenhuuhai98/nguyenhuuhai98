<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Permission;

class TestModelPermission extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_roles_relation()
    {
        $permission = new Permission();
        $relation = $permission->roles();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('permission_role.permission_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('permission_role.role_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $permission = new Permission();

        $this->assertEquals(['name', 'permission'], $permission->getFillable());
    }
}
