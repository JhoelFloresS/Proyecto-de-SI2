<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\tenant\Departamento;
use App\Models\tenant\User;
use Database\Seeders\tenant\BcpSeeder;
use Database\Seeders\tenant\BitacoraSeeder;
use Database\Seeders\tenant\BnbSeeder;
use Database\Seeders\tenant\DepartamentoSeeder;
use Database\Seeders\tenant\UserSeeder;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'bcp@gmail.com',
            
        ]);

        $empresa2 = Tenant::create([
            'id' => 'bnb',
            'name' => 'Banco BNB',
            'email' => 'bnb@gmail.com',
        ]);

        $empresa1->run( function() {
            $this->call(BcpSeeder::class);
        });

        $empresa2->run( function() {
            $this->call(BnbSeeder::class);
        });

        // //seed the tenant
        // $empresa1->run( function(){
        //     $this->call(NuviaSeeder::class);
        // });
    }
}