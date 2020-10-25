<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $categoryName = $faker->word;
    return [
        'user_id' => factory(App\User::class),
        'name' => $categoryName,
        'slug' => Str::slug($categoryName, '-'),
    ];
});
