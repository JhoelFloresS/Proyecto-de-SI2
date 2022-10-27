<?php

namespace Database\Seeders\tenant\bnb;

use App\Models\tenant\Bitacora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BitacoraSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:00:02',
            'ip_maquina' => '198.168.10.24',
            'users_id' => 1,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:00:11',
            'ip_maquina' => '198.168.0.64',
            'users_id' => 2,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:10:44',
            'ip_maquina' => '198.168.0.2',
            'users_id' => 3,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:14:12',
            'ip_maquina' => '198.168.32.52',
            'users_id' => 4,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:15:58',
            'ip_maquina' => '198.168.32.40',
            'users_id' => 5,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:16:05',
            'ip_maquina' => '198.168.32.41',
            'users_id' => 6,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:20:28',
            'ip_maquina' => '198.168.32.32',
            'users_id' => 7,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:22:36',
            'ip_maquina' => '198.168.32.19',
            'users_id' => 8,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:30:01',
            'ip_maquina' => '198.168.32.05',
            'users_id' => 9,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:32:55',
            'ip_maquina' => '198.168.160.25',
            'users_id' => 10,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:37:55',
            'ip_maquina' => '198.168.160.22',
            'users_id' => 11,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:40:05',
            'ip_maquina' => '198.168.160.40',
            'users_id' => 12,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:41:15',
            'ip_maquina' => '198.168.160.41',
            'users_id' => 13,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:43:28',
            'ip_maquina' => '198.168.160.43',
            'users_id' => 14,
        ]);
        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:45:51',
            'ip_maquina' => '198.168.160.45',
            'users_id' => 15,
        ]);

        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 23:55:24',
            'ip_maquina' => '198.168.10.24',
            'users_id' => 1,
        ]); 
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:00:24',
            'ip_maquina' => '198.168.0.64',
            'users_id' => 2,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:05:21',
            'ip_maquina' => '198.168.0.2',
            'users_id' => 3,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:12:20',
            'ip_maquina' => '198.168.32.52',
            'users_id' => 4,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:14:41',
            'ip_maquina' => '198.168.32.40',
            'users_id' => 5,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:15:49',
            'ip_maquina' => '198.168.32.41',
            'users_id' => 6,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:20:49',
            'ip_maquina' => '198.168.32.32',
            'users_id' => 7,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:25:55',
            'ip_maquina' => '198.168.32.19',
            'users_id' => 8,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:30:39',
            'ip_maquina' => '198.168.32.05',
            'users_id' => 9,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:35:47',
            'ip_maquina' => '198.168.160.25',
            'users_id' => 10,
        ]);

        Bitacora::create([
            'accion' => 'Inicio de sesión',
            'fecha' => '2022-10-25 07:34:35',
            'ip_maquina' => '198.168.160.33',
            'users_id' => 10,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:37:13',
            'ip_maquina' => '198.168.160.33',
            'users_id' => 10,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:39:22',
            'ip_maquina' => '198.168.160.22',
            'users_id' => 11,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:40:03',
            'ip_maquina' => '198.168.160.40',
            'users_id' => 12,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:42:13',
            'ip_maquina' => '198.168.160.41',
            'users_id' => 13,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:43:22',
            'ip_maquina' => '198.168.160.43',
            'users_id' => 14,
        ]);
        Bitacora::create([
            'accion' => 'Cierre de sesión',
            'fecha' => '2022-10-25 14:48:26',
            'ip_maquina' => '198.168.160.45',
            'users_id' => 15,
        ]);
    }
}
