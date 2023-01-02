<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary()->onUpdate('cascade')->onDelete('cascade');

            // your custom columns may go here
            $table->string('name');
            $table->string('direccion')->nullable();
            $table->string('email');
            $table->string('logo')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('fuente')->nullable();

            $table->timestamps();
            $table->json('data')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
