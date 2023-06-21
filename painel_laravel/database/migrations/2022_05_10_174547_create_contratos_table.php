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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_contratante');
            $table->bigInteger('id_gestor');
            $table->bigInteger('id_versao');
            $table->date('prz_contrato')->nullable();
            $table->smallInteger('prz_contrato_os')->nullable();
            $table->char('num_contrato',10);
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
        Schema::dropIfExists('contratos');
    }
};
