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
        Schema::create('desc_add_prazos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_versao');
            $table->boolean('adicional');
            $table->char('desc',40);
            $table->bigInteger('id_func');
            $table->date('prazo');
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
        Schema::dropIfExists('desc_add_prazos');
    }
};
