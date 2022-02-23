<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Faker\Provider as Provider;
use App\SiteContato as Contato;
use Illuminate\Support\Str;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        $contato = new Contato;
        /*        

        dd($request);
        
        echo "<pre>";
            print_r($request->all());
        echo "</pre>";

        print_r("Meu nome é " . $request->input('nome'));
        
        $contato->create($request->all());
        
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->mensagem = $request->input('mensagem');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->email = $request->input('email');
        
        $contato->getAttributes();
        $contato->save();
        */
        $faker = Faker::create();
        $faker->addProvider(new Provider\pt_BR\PhoneNumber($faker));

        $contato->nome = $faker->name;
        $contato->telefone = $faker->cellphoneNumber;
        $contato->email = $faker->unique()->safeEmail;
        $contato->motivo_contato = $faker->numberBetween(1,3);
        $contato->mensagem = $faker->realText($faker->numberBetween(10,50));

        return view('site.contato', ['titulo' => 'Contato', 'nome' => $contato->nome]);
    }

    public function salvar(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:50',
            'telefone' => 'required',
            'mensagem' => 'required',
            'motivo_contato' => 'required',
            'email' => 'required|max:2000',
        ]);
        Contato::create($request->all());
        
        return redirect()->back()->with('sucesso', 'Conta registrada com sucesso!');
    }
}
