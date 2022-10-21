<?php

namespace Database\Seeders;

use App\Models\Bitacora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //date('Y-m-d H:i:s')
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-20 23:16:11',
            'ip_maquina' => '198.168.10.24',
            'users_id' => 1,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-20 23:55:24',
            'ip_maquina' => '198.168.10.24',
            'users_id' => 1,
            'tenants_id' => 'bcp'
        ]);

        
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-21 07:00:55',
            'ip_maquina' => '198.168.0.10',
            'users_id' => 2,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-21 07:20:22',
            'ip_maquina' => '198.168.10.12',
            'users_id' => 3,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-21 07:50:09',
            'ip_maquina' => '198.168.12.12',
            'users_id' => 4,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-21 08:02:25',
            'ip_maquina' => '198.168.62.25',
            'users_id' => 5,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-21 08:35:45',
            'ip_maquina' => '198.168.0.30',
            'users_id' => 6,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-22 07:05:15',
            'ip_maquina' => '198.168.162.32',
            'users_id' => 7,
            'tenants_id' => 'bnb'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-22 07:15:14',
            'ip_maquina' => '198.168.160.10',
            'users_id' => 8,
            'tenants_id' => 'bnb'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-22 07:41:01',
            'ip_maquina' => '198.168.32.16',
            'users_id' => 9,
            'tenants_id' => 'bnb'
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-22 07:45:35',
            'ip_maquina' => '198.168.160.64',
            'users_id' => 10,
            'tenants_id' => 'bnb'
        ]);


        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-21 14:12:50',
            'ip_maquina' => '198.168.0.10',
            'users_id' => 2,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-21 14:20:14',
            'ip_maquina' => '198.168.10.12',
            'users_id' => 3,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-21 14:35:18',
            'ip_maquina' => '198.168.12.12',
            'users_id' => 4,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-21 14:40:30',
            'ip_maquina' => '198.168.62.25',
            'users_id' => 5,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-21 14:42:58',
            'ip_maquina' => '198.168.0.30',
            'users_id' => 6,
            'tenants_id' => 'bcp'
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-22 14:02:58',
            'ip_maquina' => '198.168.162.32',
            'users_id' => 7,
            'tenants_id' => 'bnb'
        ]);


        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-22 14:22:50',
            'ip_maquina' => '198.168.160.10',
            'users_id' => 8,
            'tenants_id' => 'bnb'
        ]);    
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-22 14:51:47',
            'ip_maquina' => '198.168.32.16',
            'users_id' => 9,
            'tenants_id' => 'bnb'
        ]);    
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-22 14:55:08',
            'ip_maquina' => '198.168.160.64',
            'users_id' => 10,
            'tenants_id' => 'bnb'
        ]);




    }
}
