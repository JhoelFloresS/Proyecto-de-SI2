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
        Schema::create('credito_detalles', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            //$table->boolean('estado');
            $table->integer('duracion')->nullable();
            $table->float('tasa_interes')->nullable();
            $table->string('pago_estado')->nullable();
            $table->integer('nro_cuotas')->nullable();
            $table->unsignedBigInteger('carpeta_id');

            $table->foreign('carpeta_id')->references('id')->on('carpeta_creditos')
            ->cascadeOnDelete()->onUpdate('cascade');
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
        Schema::dropIfExists('credito_detalles');
    }
};
