<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        factory(SiteContato::class, 5)->create();
        /*
        $contato = new SiteContato;
        $contato->name = 'Jonathan';
        $contato->telefone = '(21) 89907-1890';
        $contato->email = 'jjjameson@dailybugle.com.br';
        $contato->motivo_contato = 2;
        $contato->mensagem = "I'm sending this message to propose a deal to divulge both our webpages. Please, answer as soon as possible.";
        $contato->save();

        /*
        Fornecedor::create([
            'nome' => 'Atlus',
            'site' => 'atlus.com.br',
            'email' => 'costumerservice@atlus.com.br',
            'uf' => 'JṔ'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Atlus',
            'site' => 'atlus.com.br',
            'email' => 'costumerservice@atlus.com.br',
            'uf' => 'JṔ'
        ]);
        */
    }
}
