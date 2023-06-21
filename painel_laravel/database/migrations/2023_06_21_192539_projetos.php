<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 70)->nullable(false);
            $table->string('descricao', 200)->nullable(false);
            $table->smallInteger('numero_projeto')->nullable(false);
            $table->uuid('contrato_id');
            $table->uuid('gestor_id');
            $table->uuid('responsavel_id');
            $table->unsignedInteger('tipo_recorrencia_id');
            $table->unsignedInteger('tipo_entrega_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('contrato_id')->references('id')->on('contratos');
            $table->foreign('gestor_id')->references('id')->on('funcionarios');
            $table->foreign('responsavel_id')->references('id')->on('funcionarios');
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
        Schema::dropIfExists('projetos');
    }
}
