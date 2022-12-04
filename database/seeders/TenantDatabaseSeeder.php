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
            'logo' => 'https://is5-ssl.mzstatic.com/image/thumb/Purple122/v4/f6/5d/a5/f65da547-be28-9052-a574-87f3c76db878/AppIcon-1x_U007emarketing-0-7-0-85-220.png/230x0w.webp'
        ]);
       

        $empresa2 = Tenant::create([
            'id' => 'bnb',
            'name' => 'Banco BNB',
            'email' => 'bnb@gmail.com',
            'logo' => ' https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/BNB_Logo.png/1010px-BNB_Logo.png'
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