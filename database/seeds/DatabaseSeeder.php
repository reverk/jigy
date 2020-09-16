<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        // Create roles & assign permissions
        Role::create(['name' => 'writer'])
            ->givePermissionTo(['manage articles']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['manage articles', 'manage all articles', 'manage users']);

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        factory(App\User::class)
            ->create([
                'name' => 'Super Admin User',
                'email' => 'super-admin@example.com'
            ])->each(function ($user) {
                $user->assignRole('super-admin');
            });

        // Only load fake data in local environment
        if (env('APP_ENV') == 'local') {
            // Fake users
            factory(App\User::class, 5)->create()->each(function ($user) {
                $user->assignRole('writer');
            });
            factory(App\User::class)
                ->create([
                    'name' => 'Admin User',
                    'email' => 'admin@example.com'
                ])
                ->each(function ($user) {
                    $user->assignRole('admin');
                });

            // Fake articles, tags, category
            // Not the most elegant solution, but at least it works
            for ($i = 0; $i <= 5; $i++) {
                factory(App\Category::class)->create([
                    'user_id' => App\User::all()->random()->id
                ]);

                factory(App\Tag::class)->create([
                    'user_id' => App\User::all()->random()->id
                ]);
            }

            for ($i = 0; $i <= 10; $i++) {
                factory(App\Article::class)->create([
                    'user_id' => App\User::all()->random()->id,
                    'category_id' => App\Category::all()->random()->id
                ]);
            }

            foreach (App\Article::all() as $art) {
                $art->tags()->attach(array(rand(1, 5)));
            }
        }
    }
}
