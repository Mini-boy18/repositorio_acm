<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->string('autor')->nullable();
    $table->text('descricao')->nullable();
    $table->text('arquivo_url');
    $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
    $table->foreignId('criado_por')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('conteudos');
    }
}
