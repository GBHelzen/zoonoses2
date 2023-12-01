<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnPessoaJuridicaIdOnServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('servicos', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_juridica_id')->nullable();
            $table->foreign('pessoa_juridica_id')->references('id')->on('pessoa_juridicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->dropColumn('pessoa_juridica_id');
        });
    }
}
