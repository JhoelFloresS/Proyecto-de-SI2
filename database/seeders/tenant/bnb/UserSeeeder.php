<?php

namespace Database\Seeders\tenant\bnb;

use App\Models\User;
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
            'name' => 'Admin BNB',
            'email' => 'admin_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69465520',
            'departamentos_id' => 1
        ])->assignRole('Admin');

        User::create([
            'name' => 'Carlos Ponce',
            'email' => 'carlos_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '65152340',
            'departamentos_id' => 1
        ])->assignRole('Admin');

        User::create([
            'name' => 'Juan Mendoza Pereira',
            'email' => 'juan_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '75174852',
            'departamentos_id' => 2
        ])->assignRole('Director de finanzas');
        User::create([
            'name' => 'Marco Antonio Soliz',
            'email' => 'marco_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63295852',
            'departamentos_id' => 2
        ])->assignRole('Director de finanzas');
        User::create([
            'name' => 'Lucia Rodrigues',
            'email' => 'lucia_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63295811',
            'departamentos_id' => 2
        ])->assignRole('Director de finanzas');

        User::create([
            'name' => 'Enrique Iglesias',
            'email' => 'enrique_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64140472',
            'departamentos_id' => 3
        ])->assignRole('Oficial de Credito');
        User::create([
            'name' => 'Andres Luis Guerra',
            'email' => 'andres_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64140472',
            'departamentos_id' => 3
        ])->assignRole('Oficial de Credito');
        User::create([
            'name' => 'Alberto Soliz Montenegro',
            'email' => 'alberto_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74191823',
            'departamentos_id' => 3
        ])->assignRole('Oficial de Credito');
        User::create([
            'name' => 'Patrick Smith',
            'email' => 'patrick_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69181875',
            'departamentos_id' => 3
        ])->assignRole('Comité de Credito');
        User::create([
            'name' => 'Pamela Rojas',
            'email' => 'pamela_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '68758003',
            'departamentos_id' => 3
        ])->assignRole('Comité de Credito');

        //clientes
        User::create([
            'name' => 'Julio Mendoza',
            'email' => 'julio_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '62141480',
            'departamentos_id' => 4
        ]);
        User::create([
            'name' => 'Maria Salvatierra Torrez',
            'email' => 'maria_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74185857',
            'departamentos_id' => 4
        ]);

        User::create([
            'name' => 'Pedro Burgoa',
            'email' => 'pedro_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74196965',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Jose Valverde',
            'email' => 'jose_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63152954',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Sebastian Medrano Peres',
            'email' => 'sebastian_bnb@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63120987',
            'departamentos_id' => 5
        ]);
    } 
}
