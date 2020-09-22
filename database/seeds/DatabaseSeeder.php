<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleSeeder::class);

        factory(App\User::class)
            ->create([
                'name' => 'Super Admin User',
                'email' => 'super-admin@example.com'
            ])->each(function ($user) {
                $user->assignRole('super-admin');
            });

        // Only load fake data in local or staging environment
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'staging') {
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
