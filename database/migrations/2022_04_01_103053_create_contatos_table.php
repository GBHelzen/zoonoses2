<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('status', 100)->nullable();
            $table->string('telefone_contatado', 100)->nullable();
            $table->date('data_contato')->nullable();
            $table->string('observacao', 100)->nullable();

            $table->unsignedBigInteger('servico_id')->nullable();
            $table->foreign('servico_id')->references('id')->on('servicos');

            $table->bigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->foreign('updated_by')->references('id')->on('users');
            $table->bigInteger('updated_by')->nullable();

            $table->foreign('deleted_by')->references('id')->on('users');
            $table->bigInteger('deleted_by')->nullable();

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
        Schema::dropIfExists('contatos');
    }
}
