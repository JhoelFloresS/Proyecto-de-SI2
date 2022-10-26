<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'nombre' => 'Básico',
            'descripcion' => 'Para equipos pequeños',
            'precio' => '1000.0',
            'descuento' => '10.0'
        ]);
        Plan::create([
            'nombre' => 'Estándar',
            'descripcion' => 'Para equipos medianos y grandes de 50 personas o más',
            'precio' => '1500.0',
            'descuento' => '15.0'
        ]);
        Plan::create([
            'nombre' => 'Premium',
            'descripcion' => 'Para equipos de gran tamaño',
            'precio' => '2000.0',
            'descuento' => '20.0'
        ]);

    }
}
