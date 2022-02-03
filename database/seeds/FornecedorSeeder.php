<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Fornecedor::class, 5)->create();

        /*
        $fornecedor = new Fornecedor;
        $fornecedor->nome = 'Atlus';
        $fornecedor->site = 'atlus.com.br';
        $fornecedor->email = 'costumerservice@atlus.com.br';
        $fornecedor->uf = 'JP';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Atlus',
            'site' => 'atlus.com.br',
            'email' => 'costumerservice@atlus.com.br',
            'uf' => 'JP'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Atlus',
            'site' => 'atlus.com.br',
            'email' => 'costumerservice@atlus.com.br',
            'uf' => 'JP'
        ]);
        */
    }
}
