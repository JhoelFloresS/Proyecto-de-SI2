<?php

namespace Database\Seeders\tenant;

use Database\Seeders\tenant\bnb\BitacoraSeeeder;
use Database\Seeders\tenant\bnb\DepartamentoSeeeder;
use Database\Seeders\tenant\bnb\UserSeeeder;
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
        $this->call(UserSeeeder::class);
        $this->call(BitacoraSeeeder::class);
        
    }
}
