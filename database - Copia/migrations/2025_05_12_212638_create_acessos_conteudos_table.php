<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessos_conteudos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('conteudo_id')->constrained('conteudos')->onDelete('cascade');
    $table->enum('tipo_acesso', ['leitura', 'download']);
    $table->timestamp('data_acesso')->useCurrent();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acessos_conteudos');
    }
}
