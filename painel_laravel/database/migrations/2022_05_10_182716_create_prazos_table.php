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
            $table->id();
            $table->bigInteger('id_versao');
            $table->bigInteger('id_macro');
            $table->bigInteger('id_micro');
            $table->bigInteger('id_func');
            $table->boolean('is_concl');
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
        Schema::dropIfExists('prazos');
    }
};
