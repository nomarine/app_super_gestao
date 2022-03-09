<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;
use Faker\Provider as Provider;
use Illuminate\Support\Str;

$factory->define(SiteContato::class, function (Faker $faker) {
    $faker->addProvider(new Provider\pt_BR\PhoneNumber($faker));
    return [
        //
        'nome' => $this->faker->name,
        'telefone' => $this->faker->cellphoneNumber,
        'email' => $faker->unique()->safeEmail,
        'motivos_contato_id' => $this->faker->numberBetween(1,3),
        'mensagem' => $this->faker->realText($faker->numberBetween(10,50)),
    ];
});
