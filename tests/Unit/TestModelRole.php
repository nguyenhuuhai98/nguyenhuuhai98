<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Role;

class TestModelRole extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_users_relation()
    {
        $role = new Role();
        $relation = $role->users();

        $this->assertEquals('id', $relation->getLocalKeyName());
        $this->assertEquals('role_id', $relation->getForeignKeyName());
        $this->assertInstanceOf(HasMany::class, $relation);
    }

    public function test_permissions_relation()
    {
        $role = new Role();
        $relation = $role->permissions();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('permission_role.role_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('permission_role.permission_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function test_contains_valid_fillable_properties()
    {
        $role = new Role();

        $this->assertEquals(['name'], $role->getFillable());
    }
}
