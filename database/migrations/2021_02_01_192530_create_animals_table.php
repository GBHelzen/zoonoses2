<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //     public $nome, $sexo, $idade, $especie, $raca, $cor_pelagem, $temperamento, $num_identificacao, $num_chip;
        // public $vacinado_raiva, $vacinado_raiva_data, $vacinado_polivalente, $vacinado_polivalente_data;
        // public $animal_rua, $animal_ong, $animal_castrado, $animal_castrado_data, $observacao;

        Schema::create('animals', function (Blueprint $table) {

            $table->id();


            $table->string('nome', 100)->nullable();
            $table->string('sexo', 10)->nullable();
            $table->string('idade', 10)->nullable();
            $table->string('especie', 100)->nullable();
            $table->string('raca', 100)->nullable();
            $table->string('porte', 100)->nullable();
            $table->string('cor_pelagem', 100)->nullable();
            $table->string('temperamento', 100)->nullable();
            $table->string('num_identificacao', 100)->nullable();
            $table->string('num_chip', 100)->nullable();

            $table->boolean('vacinado_raiva')->nullable();
            $table->date('vacinado_raiva_data')->nullable();
            $table->boolean('vacinado_polivalente')->nullable();
            $table->date('vacinado_polivalente_data')->nullable();

            $table->boolean('animal_rua')->nullable();
            $table->boolean('animal_ong')->nullable();
            $table->boolean('animal_castrado')->nullable();
            $table->date('animal_castrado_data')->nullable();

            $table->string('observacao')->nullable();

            $table->unsignedBigInteger('pessoa_id')->nullable();
            // $table->foreign('pessoa_id')->references('id')->on('pessoas');

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
        Schema::dropIfExists('animals');
    }
}
