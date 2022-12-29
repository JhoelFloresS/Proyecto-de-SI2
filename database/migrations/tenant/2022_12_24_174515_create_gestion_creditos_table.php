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
        Schema::create('gestion_creditos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('solicitud_id');

            $table->foreign('empleado_id')->references('id')->on('empleados')
            ->cascadeOnDelete()->onUpdate('cascade');
            $table->foreign('solicitud_id')->references('id')->on('solicitud_creditos')
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
        Schema::dropIfExists('gestion_creditos');
    }
};
