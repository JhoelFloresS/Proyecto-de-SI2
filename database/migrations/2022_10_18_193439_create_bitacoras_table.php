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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->dateTime('fecha');
            $table->dateTime('fecha_server');
            $table->string('ip_maquina');
            $table->unsignedBigInteger('users_id');
            $table->string('tenants_id');
            $table->foreign('users_id')->on('users')->references('id');
            $table->foreign('tenants_id')->on('tenants')->references('id');
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
        Schema::dropIfExists('bitacoras');
    }
};
