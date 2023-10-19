<?php

use Illuminate\Database\Seeder;
use App\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::insert([
            [
                'unidade' => 'kg', 
                'descricao' => 'Quilogramas'
            ],
            [
                'unidade' => 'm', 
                'descricao' => 'Metros'
            ],
            [
                'unidade' => 'g', 
                'descricao' => 'Gramas'
            ],
            [
                'unidade' => 'cm', 
                'descricao' => 'Centímetros'
            ],
        ]);
    }
}
