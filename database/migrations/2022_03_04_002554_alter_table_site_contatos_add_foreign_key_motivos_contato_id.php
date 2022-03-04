<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddForeignKeyMotivosContatoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivos_contato_id');
        });

        DB::statement('update site_contatos set motivos_contato_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_contato_id')->references('id')->on('motivos_contato');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivos_contato_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato = motivos_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_contato_id');
        });
    }
}
