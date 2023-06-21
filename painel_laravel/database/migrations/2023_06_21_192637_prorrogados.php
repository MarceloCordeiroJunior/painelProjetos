<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProrrogadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prorrogados', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_objeto');
            $table->uuid('prazo_id');
            $table->text('descricao');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());

            $table->foreign('id_objeto')->references('id')->on('objetos');
            $table->foreign('prazo_id')->references('id')->on('prazos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prorrogados');
    }
}
