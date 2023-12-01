<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePessoaJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_juridicas', function (Blueprint $table) {

            $table->id();


            $table->string('nome_fantasia', 250)->nullable();
            $table->string('razao_social', 250)->nullable(false);
            $table->string('descricao', 250)->nullable();
            $table->string('cnpj', 25)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('email')->nullable();

            $table->boolean('finalizou_cadastro_pessoa')->default(0)->nullable();


            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();



            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->foreign('responsavel_id')->references('id')->on('pessoas');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_juridicas');
    }
}
