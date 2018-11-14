<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('consultor_id');
            $table->unsignedSmallInteger('h_consultoria')->nullable();
            $table->unsignedSmallInteger('h_coordenacao')->nullable();
            $table->unsignedSmallInteger('h_translado')->nullable();
            $table->decimal('orcamento', 8, 2)->nullable();
            $table->enum('status', ['aberto','aprovado','aguardando','cancelado'])->default('aberto');
            $table->timestamps();
			
			$table->index('empresa_id');
            $table->index('consultor_id');

            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cotacoes');
    }
}
