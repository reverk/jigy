<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear cached roles & permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage articles']);
        Permission::create(['name' => 'manage all articles']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage taxonomies']);

        // Create roles & assign permissions
        Role::create(['name' => 'writer'])
            ->givePermissionTo(['manage articles']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['manage articles', 'manage all articles', 'manage users', 'manage taxonomies']);

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());
    }
}
