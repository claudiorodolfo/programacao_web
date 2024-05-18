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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exame_id')->unsigned();            
            $table->integer('turma_id')->unsigned();
            $table->integer('aluno_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->string('papel');            
            $table->text('observacao')->nullable();
            $table->string('status')->nullable();
            $table->boolean('rascunho')->default(true);                                                                                                
            $table->timestamps();

            //$table->primary('id');            
            $table->foreign('exame_id')->references('id')->on('exame');
            $table->foreign('turma_id')->references('id')->on('turma');                                      
            $table->foreign('aluno_id')->references('id')->on('usuario');  
            $table->foreign('professor_id')->references('id')->on('usuario');                          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
