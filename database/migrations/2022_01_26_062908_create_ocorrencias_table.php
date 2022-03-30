<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->string('turno');
            $table->text('detalhes');
            $table->text('outros_envolvidos')->nullable();
            $table->unsignedBigInteger('escola_id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('tipo_ocorrencia_id');
            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('tipo_ocorrencia_id')->references('id')->on('tipos_ocorrencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias');
    }
}
