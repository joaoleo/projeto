<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mifs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('projeto_id');
            $table->string('nome', 45);
            $table->boolean('assinado')->default(false);
            $table->boolean('entregue')->default(false);
            $table->boolean('easy_project')->default(false);
            $table->timestamps();

            $table->index('projeto_id');

            $table->foreign('projeto_id')->references('id')->on('projetos')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mifs');
    }
}
