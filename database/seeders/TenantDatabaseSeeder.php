<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;
// use Database\Seeders\Tenant\NuviaSeeder;
// use Database\Seeders\Tenant\AlasSeeder;



class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa1 = Tenant::create([
            'id' => 'bcp',
            'name' => 'Banco BCP',
        ]);

        $empresa2 = Tenant::create([
            'id' => 'bnb',
            'name' => 'Banco BNB',
        ]);

        // //seed the tenant
        // $empresa1->run( function(){
        //     $this->call(NuviaSeeder::class);
        // });
    }
}