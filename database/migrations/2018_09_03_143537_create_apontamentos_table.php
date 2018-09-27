<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApontamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apontamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('projeto_id');
            $table->unsignedInteger('consultor_id');
            $table->time('inicio');
            $table->time('almoco');
            $table->time('fim');

            $table->decimal('refeicao')->nullable();
            $table->decimal('estacionamento')->nullable();
            $table->decimal('kms')->nullable();
            $table->decimal('pedagio')->nullable();
            $table->decimal('hospital')->nullable();
            $table->decimal('taxi')->nullable();
            $table->decimal('despesas')->nullable();
            $table->text('observacao')->nullable();

            $table->timestamps();

            $table->index('empresa_id');
            $table->index('projeto_id');
            $table->index('consultor_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('projeto_id')->references('id')->on('projetos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('consultor_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apontamentos');
    }
}
