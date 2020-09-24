<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => factory(App\User::class),
        'category_id' => factory(App\Category::class),
        'is_outside' => $faker->boolean(50),
        'title' => $title,
        'slug' => str_replace(' ', '-', $title),
        'excerpt' => $faker->paragraph,
        'thumbnail_image' => asset('static/images/default_thumbpng.png'),
        'body' => $faker->randomHtml(),
    ];
});
