<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
    	'post_thumbnail' => 'faker/' . $faker->image(public_path('uploads/posts/faker'), 300, 300, null, false),

        // create translations
        'title:en'   => $faker->sentence(3, true),
        'content:en' => $faker->text(200),
        'title:hu'   => $faker->sentence(3, true),
        'content:hu' => $faker->text(200),
    ];
});
