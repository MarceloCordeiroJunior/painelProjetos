<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ativos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ativo', 200)->nullable(false);
            $table->char('centro_custo', 5)->nullable(false);
            $table->smallInteger('pedido_venda')->nullable(false);
            $table->uuid('contrato_id');
            $table->unsignedInteger('tipo_venda_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('contrato_id')->references('id')->on('contratos');
            $table->foreign('tipo_venda_id')->references('id')->on('tipo_vendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ativos');
    }
};
