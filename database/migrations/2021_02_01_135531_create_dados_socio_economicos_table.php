<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDadosSocioEconomicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_socio_economicos', function (Blueprint $table) {

            $table->id();

            $table->string('renda_familiar', 30)->nullable();
            $table->string('pessoas_em_domicilio', 30)->nullable();

            $table->boolean('participa_programa_social')->nullable();
            $table->jsonb('programas_sociais')->nullable();

            $table->smallInteger('quantidade_cachorro_macho')->nullable();
            $table->smallInteger('quantidade_cachorro_femea')->nullable();
            $table->smallInteger('quantidade_cachorro_total')->nullable();

            $table->smallInteger('quantidade_gato_macho')->nullable();
            $table->smallInteger('quantidade_gato_femea')->nullable();
            $table->smallInteger('quantidade_gato_total')->nullable();

            $table->unsignedBigInteger('pessoa_id')->nullable();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');

            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_socio_economicos');
    }
}
