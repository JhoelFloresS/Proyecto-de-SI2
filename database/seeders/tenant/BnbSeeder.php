<?php

namespace Database\Seeders\tenant;


use Database\Seeders\tenant\bnb\BitacoraSeeeder;
use Database\Seeders\tenant\bnb\ClienteSeeder;
use Database\Seeders\tenant\bnb\CreditoSeeder;
use Database\Seeders\tenant\bnb\DepartamentoSeeeder;
use Database\Seeders\tenant\bnb\EmpleadoSeeder;
use Database\Seeders\tenant\bnb\UserSeeeder;
use Database\Seeders\tenant\bnb\RoleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BnbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentoSeeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CreditoSeeder::class);
    }
}
