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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->char('nome',40);
            $table->char('cnpj',18);
            $table->char('area',3);
            $table->char('estado',2);
            $table->char('cidade',30);
            $table->char('endereco',50)->nullable();
            $table->char('n_contato',14);
            $table->char('email_princ',50);
            $table->char('email_sec',50)->nullable();
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
        Schema::dropIfExists('empresas');
    }
};
