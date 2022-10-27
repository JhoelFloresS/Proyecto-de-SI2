<?php

namespace Database\Seeders\tenant;

use Database\Seeders\tenant\bcp\BitacoraSeeeder;
use Database\Seeders\tenant\bcp\DepartamentoSeeeder;
use Database\Seeders\tenant\bcp\UserSeeeder;
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
        $this->call(DepartamentoSeeeder::class);
        $this->call(UserSeeeder::class);
        //$this->call(BitacoraSeeeder::class);
    }
}
