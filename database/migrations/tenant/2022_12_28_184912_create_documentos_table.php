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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('archivo_url');
            $table->string('public_id');
            $table->string('descripcion');
            $table->string('formato');
            $table->dateTime('fecha_hora');
            $table->unsignedBigInteger('carpeta_id');

            $table->foreign('carpeta_id')->references('id')->on('carpeta_creditos')->cascadeOnDelete()->onUpdate('cascade');
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
        Schema::dropIfExists('documentos');
    }
};
