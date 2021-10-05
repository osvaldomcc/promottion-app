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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'country_id' => 1,
        'name' => 'Osvaldo',
        'email' => 'osvaldo@ss.onei.cu',
        'password' => bcrypt('osvaldo'),
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Cuba',
        'slug' => 'cuba',
    ];
});

$factory->define(App\Picture::class, function (Faker\Generator $faker) {
    return [
        'bussine_id' => 6,
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        'comenter'=>'manuel@ss.onei.cu',
        'user_id'=>'2',
        'body'=>'Gracias por comentar',
    ];
});


$factory->define(App\Bussine::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slogan' => "Only Us",
        'municipality_id' => 2,
        'subcategory_id' => 2,
        'ranking' => 5,
        'lang_id' => 2,
        'address' => $faker->text,
        'description' => $faker->text,
        'banner' =>1,
        'slug' =>"los-laureles",
        'characteristics' =>"Wifi 24 hours;fa fa-user;facial beauty;fa fa-user; sale of sport implements;fa fa-user",
    ];
});


