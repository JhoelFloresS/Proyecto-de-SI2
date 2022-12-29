<?php

namespace Database\Seeders\tenant;

use Database\Seeders\tenant\bcp\BitacoraSeeeder;
use Database\Seeders\tenant\bcp\ClienteSeeder;
use Database\Seeders\tenant\bcp\CreditoSeeder;
use Database\Seeders\tenant\bcp\DepartamentoSeeeder;
use Database\Seeders\tenant\bcp\EmpleadoSeeder;
use Database\Seeders\tenant\bcp\UserSeeeder;
use Database\Seeders\tenant\bcp\RoleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BcpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(DepartamentoSeeeder::class);
        $this->call(UserSeeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CreditoSeeder::class);

    }
}
