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
            //consultor
            $table->unsignedInteger('consultor_id');
            $table->unsignedSmallInteger('h_consultoria')->nullable();
            $table->unsignedInteger('consultor_taxa');
            $table->decimal('f_consultoria')->nullable();
            //coordenador
            $table->unsignedInteger('coordenador_id');
            $table->unsignedSmallInteger('h_coordenacao')->nullable();
            $table->unsignedInteger('coordenador_taxa');
            $table->decimal('f_coordenacao')->nullable();
            //translado
            $table->unsignedInteger('viajante_id');
            $table->unsignedSmallInteger('h_translado')->nullable();
            $table->unsignedInteger('translado_taxa');
            $table->decimal('f_translado')->nullable();
            //
            $table->enum('status', ['aberto','aprovado','aguardando','cancelado'])->default('aberto');
            $table->decimal('total_simposto', 8, 2)->nullable();
            $table->timestamps();

            //empresa
			$table->index('empresa_id');
            //users
            $table->index('consultor_id');
            $table->index('coordenador_id');
            $table->index('viajante_id');
            //taxas
            $table->index('consultor_taxa');
            $table->index('coordenador_taxa');
            $table->index('translado_taxa');

            //empresa
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            //users
            $table->foreign('consultor_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('coordenador_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('viajante_id')->references('id')->on('users')->onUpdate('cascade');
            //taxas
            $table->foreign('consultor_taxa')->references('id')->on('taxas')->onUpdate('cascade');
            $table->foreign('coordenador_taxa')->references('id')->on('taxas')->onUpdate('cascade');
            $table->foreign('translado_taxa')->references('id')->on('taxas')->onUpdate('cascade');
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
