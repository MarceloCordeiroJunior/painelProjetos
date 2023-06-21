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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->char('nome',40);
            $table->char('cpf',14);
            $table->char('telefone',14);
            $table->char('tel2',14)->nullable();
            $table->char('email_princ',50);
            $table->char('email_sec',50)->nullable();
            $table->char('cargo',25);
            $table->bigInteger('id_empresa');
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
        Schema::dropIfExists('clientes');
    }
};
