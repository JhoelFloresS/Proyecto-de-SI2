<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Plan;
use Database\Seeders\tenant\DepartamentoSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\TenantDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
       $this->call(TenantDatabaseSeeder::class);
       $this->call(PlanSeeder::class);
       $this->call(SuscripcionSeeder::class);
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       //$this->call(BitacoraSeeder::class);

    }
}
