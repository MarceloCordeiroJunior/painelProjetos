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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->char('nome',50);
            $table->bigInteger('id_empresa');
            $table->char('numero',5);
            $table->char('cidade',25);
            $table->char('estado',2);
            $table->char('endereco',30)->nullable();
            $table->char('num_ped_venda',7);
            $table->char('tp_venda',15);
            $table->date('prz_entrega')->nullable();
            $table->date('prz_exec')->nullable();
            $table->smallInteger('prz_entrega_os')->nullable();
            $table->smallInteger('prz_exec_os')->nullable();
            $table->char('desc',200);
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
        Schema::dropIfExists('projetos');
    }
};
