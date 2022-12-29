<?php

namespace Database\Seeders\tenant\bcp;

use App\Models\tenant\Credito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credito::create([
            'nombre' => 'Vivienda',
            'descripcion' => 'Solicita tu crédito de vivienda con un plazo de hasta 30 años. 
            Disfruta hoy de las grandes ventajas que te damos.'
        ]);

        Credito::create([
            'nombre' => 'Vehicular',
            'descripcion' => 'Préstamo para la compra de vehículos nuevos o usados de uso particular. Vehículo nuevo: mínimo 20% del valor comercial.',
        ]);

        Credito::create([
            'nombre' => 'Consumo',
            'descripcion' => 'Solicita hoy tu crédito de consumo y empieza a pagar tu primera cuota hasta en 3 meses. Obtén tu desembolso desde 24 horas.',
        ]);
    }
}
