<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->unsignedInteger('estado_id');
            $table->string('cidade', 45);
            $table->text('endereco')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->index('estado_id');
//            $table->index('cidade_id');

            $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade');
//            $table->foreign('cidade_id')->references('id')->on('cidades')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
