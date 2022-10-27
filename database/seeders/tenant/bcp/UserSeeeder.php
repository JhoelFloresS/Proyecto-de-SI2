<?php

namespace Database\Seeders\tenant\bcp;

use App\Models\tenant\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeeder extends Seeder
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
            'name' => 'Admin BCP',
            'email' => 'admin_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '62265520',
            'departamentos_id' => 1
        ]);
        User::create([
            'name' => 'Julio Gonzales',
            'email' => 'julio_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '65152110',
            'departamentos_id' => 1
        ]);

        User::create([
            'name' => 'Lucia Mendoza Fernandez',
            'email' => 'lucia_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '75173352',
            'departamentos_id' => 2
        ]);
        User::create([
            'name' => 'Antonio Burgoa',
            'email' => 'antonio_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63295662',
            'departamentos_id' => 2
        ]);
        User::create([
            'name' => 'Juana Torrez Domingues',
            'email' => 'juana_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '65595811',
            'departamentos_id' => 2
        ]);

        User::create([
            'name' => 'Carlos Mancilla Salvatierra',
            'email' => 'carlos_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64114472',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Karla Soliz',
            'email' => 'karla_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64111472',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Horacio Conde Torrez',
            'email' => 'horacio_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74001823',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Yunior Martinez Sandoval',
            'email' => 'yunior_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69181325',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Angela Cardenal Pedraza',
            'email' => 'angela_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '68767003',
            'departamentos_id' => 3
        ]);

        User::create([
            'name' => 'Jhon Torrez',
            'email' => 'jhon_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '62181480',
            'departamentos_id' => 4
        ]);
        User::create([
            'name' => 'Maria Salas Rodrigues',
            'email' => 'maria_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74199857',
            'departamentos_id' => 4
        ]);

        User::create([
            'name' => 'Pedro Burgoa',
            'email' => 'pedro_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74190065',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Jose Burgoa Valverde',
            'email' => 'jose_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69852954',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Sebastian Montenegro Peres',
            'email' => 'sebastian_bcp@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63120901',
            'departamentos_id' => 5
        ]);
    }
}
