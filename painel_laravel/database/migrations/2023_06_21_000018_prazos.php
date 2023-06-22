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
        Schema::create('prazos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_objeto');
            $table->uuid('id_responsavel');
            $table->uuid('id_executor');
            $table->date('inicio_previsto');
            $table->date('fim_previsto');
            $table->date('inicio_efetivo');
            $table->date('fim_efetivo');
            $table->unsignedInteger('tipo_status_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('id_responsavel')->references('id')->on('funcionarios');
            $table->foreign('id_executor')->references('id')->on('funcionarios');
            $table->foreign('tipo_status_id')->references('id')->on('tipo_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prazos');
    }
};
