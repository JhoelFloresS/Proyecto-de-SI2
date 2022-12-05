<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('12345678');
        User::create([
            'name' => 'Admin Central',
            'email' => 'admin_central@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63130372',
        ])->assignRole('Admin');
        
        User::create([
            'name' => 'Ricky Roy Ramírez Pineda',
            'email' => 'ricky@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '75125741',
        ])->assignRole('Admin');
        User::create([
            'name' => 'Marco David Toledo Canna',
            'email' => 'marco@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '71484520',
        ])->assignRole('Admin');

        User::create([
            'name' => 'Kevin Jhoel Sarmiento Flores',
            'email' => 'jhoel@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '78574149',
        ])->assignRole('Admin');

        User::create([
            'name' => 'Luis Alejandro Torrez Rocha',
            'email' => 'luis@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '65252982',
        ])->assignRole('Admin');

        User::create([
            'name' => 'Andres Silva Serrate',
            'email' => 'andres@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '79474741',
        ])->assignRole('Admin'); //6
        
        
        User::create([
            'name' => 'Carlos Torrez Pedraza',
            'email' => 'carlos@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63130372',
        ]);
        User::create([
            'name' => 'Pedro Fernandez Salvatierra',
            'email' => 'pedro@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63235385',
        ]);
        User::create([
            'name' => 'Maria Montero Martinez',
            'email' => 'maria@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '75484852',
        ]);
        User::create([
            'name' => 'Julio Molina Peres',
            'email' => 'julio@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63130148',
        ]);



    }
}
