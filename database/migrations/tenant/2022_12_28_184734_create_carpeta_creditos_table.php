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
        Schema::create('carpeta_creditos', function (Blueprint $table) {
            $table->id();
            $table->string('requisito');
            $table->unsignedBigInteger('solicitud_id');
            
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
        Schema::dropIfExists('carpeta_creditos');
    }
};
