<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pessoa_id');
            $table->uuid('empresa_id');
            $table->unsignedInteger('tipo_cargo_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('tipo_cargo_id')->references('id')->on('tipo_cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
