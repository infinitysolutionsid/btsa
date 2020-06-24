<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\messagesDB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(messagesDB::class, function (Faker $faker) {
    do {
        $from = rand(1, 117);
        $to = rand(1, 117);
        $seen = rand(0, 1);
    } while ($from === $to);
    return [
        'from_id' => $from,
        'to_id' => $to,
        'body' => $faker->sentence,
        'seen' => $seen
    ];
});
