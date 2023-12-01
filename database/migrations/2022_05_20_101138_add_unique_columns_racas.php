<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueColumnsRacas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('racas', function (Blueprint $table) {
            $table->unique(['especie_id', 'nome']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('racas', function (Blueprint $table) {
            $table->dropUnique('racas_especie_id_nome_unique');
        });
    }
}
