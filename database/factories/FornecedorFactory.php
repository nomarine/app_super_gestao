<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator;

$factory->define(Fornecedor::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        //
        'nome' => $this->faker->name,
        'site' => $this->faker->url,
        'uf' => $this->faker->stateAbbr,
        'email' => $faker->unique()->safeEmail,
    ];
});
