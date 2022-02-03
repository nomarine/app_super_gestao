<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\regionAbbr($faker));
    return [
        //
        'nome' => lorem::words($nb = 3, $asText = true),
        'site' => $this->faker->numberBetween(1,5),
        'uf' => $this->faker->regionAbbr,
        'email' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1500.00) 
    ];
});
