<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    return [
        'message' => str_random(128),
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
