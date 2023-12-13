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
        Schema::create('nota', function (Blueprint $table) {
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('parametro_id')->unsigned();
            $table->smallInteger('valor');                                    
            $table->timestamps();

            $table->primary(['avaliacao_id', 'parametro_id']);
            $table->foreign('avaliacao_id')->references('id')->on('avaliacao');
            $table->foreign('parametro_id')->references('id')->on('parametro');                        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
