<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosToFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $hasFornecedorPadrao = DB::table('fornecedores')
                ->where('email', 'https://fornecedorpadrao.com.br')
                ->first();

            if($hasFornecedorPadrao === null){
                    $fornecedor_id = DB::table('fornecedores')->insertGetId([
                    'nome'=>'Fornecedor Padrão',
                    'site'=>'https://fornecedorpadrao.com.br',
                    'email'=>'fornecedorpadra@sg.com.br',
                    'uf'=>'DF',
                ]);
            }

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
