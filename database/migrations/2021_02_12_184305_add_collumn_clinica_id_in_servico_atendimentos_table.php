<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnClinicaIdInServicoAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servico_atendimentos', function (Blueprint $table) {
            $table->unsignedBigInteger('clinica_id')->nullable();
            $table->foreign('clinica_id')->references('id')->on('clinica_veterinarias');
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
            $table->dropColumn('clinica_id');
        });
    }
}
