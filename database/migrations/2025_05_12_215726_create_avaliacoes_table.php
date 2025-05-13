<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
    $table->foreignId('conteudo_id')->constrained('conteudos')->onDelete('cascade');
    $table->unsignedTinyInteger('nota'); // 1 a 5
    $table->text('comentario')->nullable();
    $table->timestamps();

    //$table->check('nota >= 1 AND nota <= 5');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
