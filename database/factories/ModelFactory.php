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
        'name' => 'Ren',
        'email' => 'ren@yahoo.com',
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Game of Thrones',
        'author' => 'George R. R. Martin',
        'publisher' => 'Bantam Spectra (US) Voyager Books (UK)',
        'edition' => 'A Song of Ice and Fire',
        'stock' => '10',
        'instock' => '10',
    ];
});
