<?php

namespace Database\Seeders;

use App\Models\Suscripcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripcion::create([
            'monto_pagado' => '1000',
            'fecha_inicio' => '2022-10-22',
            'fecha_final' => '2022-12-22',
            'tenants_id' => 'bcp',
            'planes_id' => 1
        ]);
        Suscripcion::create([
            'monto_pagado' => '1500',
            'fecha_inicio' => '2022-10-22',
            'fecha_final' => '2022-12-22',
            'tenants_id' => 'bnb',
            'planes_id' => 2
        ]);
    }
}
