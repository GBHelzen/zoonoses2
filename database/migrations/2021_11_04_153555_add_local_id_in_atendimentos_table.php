<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalIdInAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servico_atendimentos', function (Blueprint $table) {
            $table->unsignedInteger('local_id')->nullable();
            $table->foreign('local_id')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servico_atendimentos', function (Blueprint $table) {
            $table->dropForeign('local_id');
        });
    }
}
