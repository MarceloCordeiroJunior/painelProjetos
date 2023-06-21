<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubetapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subetapas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('descricao', 100)->nullable();
            $table->uuid('etapa_id');
            $table->uuid('empreendimento_id');
            $table->unsignedInteger('tipo_recorrencia_id');
            $table->unsignedInteger('tipo_entrega_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('etapa_id')->references('id')->on('etapas');
            $table->foreign('empreendimento_id')->references('id')->on('empreendimentos');
            $table->foreign('tipo_recorrencia_id')->references('id')->on('tipo_recorrencias');
            $table->foreign('tipo_entrega_id')->references('id')->on('tipo_entregas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subetapas');
    }
}
