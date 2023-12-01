<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);

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
        Schema::dropIfExists('especies');
    }
}
