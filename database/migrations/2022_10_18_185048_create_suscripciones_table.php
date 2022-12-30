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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('monto_pagado');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('tenants_id');
            $table->unsignedBigInteger('planes_id');
            $table->foreign('tenants_id')->on('tenants')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('planes_id')->on('planes')->references('id');
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
        Schema::dropIfExists('suscripciones');
    }
};
