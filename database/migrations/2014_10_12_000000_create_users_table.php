<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 70);
            $table->enum('tipo', ['clt', 'pj'])->default('clt');
            $table->decimal('pj', 8,2)->nullable();
            $table->decimal('clt', 8,2)->nullable();
            $table->decimal('vt', 8,2)->nullable();
            $table->decimal('va', 8,2)->nullable();
            $table->decimal('vr', 8,2)->nullable();
            $table->decimal('plano_saude', 8,2)->nullable();
            $table->decimal('seguro_vida', 8,2)->nullable();
            $table->decimal('full_premiacao', 8,2)->nullable();
            $table->decimal('premiacao_trimestral', 8,2)->nullable();
            $table->decimal('celular', 8,2)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
