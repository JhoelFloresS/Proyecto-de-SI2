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
        Schema::create('solicitud_creditos', function (Blueprint $table) {
            $table->id();
            $table->integer('monto');
            $table->string('motivo');
            $table->string('estado');
            $table->unsignedBigInteger('credito_id');
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('credito_id')->references('id')->on('creditos')
            ->cascadeOnDelete()->onUpdate('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')
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
        Schema::dropIfExists('solicitud_creditos');
    }
};
