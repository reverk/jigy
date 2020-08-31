<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tagName = $faker->word;
    return [
        'user_id' => factory(App\User::class),
        'name' => $tagName,
        'slug' => $tagName,
    ];
});
