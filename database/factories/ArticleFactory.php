<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => factory(App\User::class),
        'category_id' => factory(App\Category::class),
        // TODO: Add Tag once tag is defined
        'title' => $title,
        'slug' => str_replace(' ', '-', $title),
        'excerpt' => $faker->randomHtml(),
        'thumbnail_image' => $faker->image('public\storage\images'),
        'body' => $faker->paragraph,
    ];
});
