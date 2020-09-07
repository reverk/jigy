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
        factory(App\User::class, 10)->create();
        factory(App\Category::class, 5)->create();
        factory(App\Tag::class, 5)->create();
        $article = factory(App\Article::class, 10)->create();

        foreach ($article as $art) {
            $art->tags()->attach(array(rand(1, 5)));
        }

        // FIXME: Static images not working... literally
    }
}
