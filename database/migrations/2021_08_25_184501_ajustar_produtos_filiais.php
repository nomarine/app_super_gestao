<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustarProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('filiais', function(Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //Deletar colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_maximo', 'estoque_minimo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Criar colunas na tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        //Excluir constraints da tabela auxiliar produto_filiais
        Schema::table('produto_filiais', function(Blueprint $table) {
            $table->dropForeign('produto_filiais_produto_id_foreign');
            $table->dropForeign('produto_filiais_filial_id_foreign');
        });

        //Excluir tabela filiais
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}
