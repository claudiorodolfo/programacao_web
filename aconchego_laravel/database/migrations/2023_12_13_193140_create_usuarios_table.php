<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verificado_em')->nullable();
            $table->string('password');
            $table->boolean('esta_ativo');
            $table->string('celular')->nullable();
            $table->text('endereco')->nullable();
            $table->integer('turma_id_condutor')->unsigned()->nullable();
            $table->integer('turma_id_conduzido')->unsigned()->nullable();
            $table->integer('tipo_id')->unsigned();           
            $table->rememberToken();            
            $table->timestamps();

            //$table->primary('id');
            $table->foreign('turma_id_condutor')->references('id')->on('turma');
            $table->foreign('turma_id_conduzido')->references('id')->on('turma');
            $table->foreign('tipo_id')->references('id')->on('tipo');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
