<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpreendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 100)->nullable(false);
            $table->uuid('empresa_id');
            $table->unsignedInteger('tipo_empreendimento_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('tipo_empreendimento_id')->references('id')->on('tipo_empreendimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empreendimentos');
    }
}
