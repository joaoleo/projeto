<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->string('nome');
            $table->text('descricao');
            $table->unsignedTinyInteger('progresso')->default(0);

            $table->enum('status', ['aberto','finalizado','aguardando','cancelado'])->default('aberto');
            $table->date('data_inicio');
            $table->date('data_limite');
            $table->date('prazo_final');
            $table->date('data_termino');

            $table->timestamps();

            $table->index('empresa_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
