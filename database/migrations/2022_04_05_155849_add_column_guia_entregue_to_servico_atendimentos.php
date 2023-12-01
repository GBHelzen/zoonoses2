<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGuiaEntregueToServicoAtendimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servico_atendimentos', function (Blueprint $table) {
            $table->boolean('guia_entregue')->default(false)->nullable();
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
            $table->dropColumn('guia_entregue');
        });
    }
}
