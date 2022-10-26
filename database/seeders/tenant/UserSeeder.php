<?php

namespace Database\Seeders\tenant;

use App\Models\tenant\User;
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
            'name' => 'Ezequiel Fernandez',
            'email' => 'ezequiel-fernandez@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69465520',
            'departamentos_id' => 1
        ]);
        User::create([
            'name' => 'Carlos Ponce',
            'email' => 'carlos-ponce@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '65152340',
            'departamentos_id' => 1
        ]);

        User::create([
            'name' => 'Juan Mendoza Pereira',
            'email' => 'juan-mendoza@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '75174852',
            'departamentos_id' => 2
        ]);
        User::create([
            'name' => 'Marco Antonio Soliz',
            'email' => 'marco-soliz@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63295852',
            'departamentos_id' => 2
        ]);
        User::create([
            'name' => 'Lucia Rodrigues',
            'email' => 'lucia-rodrigues@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63295811',
            'departamentos_id' => 2
        ]);

        User::create([
            'name' => 'Enrique Iglesias',
            'email' => 'enrique-iglesias@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64140472',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Juan Luis Guerra',
            'email' => 'juan-guerra@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '64140472',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Alberto Soliz Montenegro',
            'email' => 'alberto-soliz@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74191823',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Patrick Smith',
            'email' => 'patrick-smith@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '69181875',
            'departamentos_id' => 3
        ]);
        User::create([
            'name' => 'Pamela Rojas',
            'email' => 'pamela-rojas@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '68758003',
            'departamentos_id' => 3
        ]);

        User::create([
            'name' => 'Julio Mendoza',
            'email' => 'julio-mendoza@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '62141480',
            'departamentos_id' => 4
        ]);
        User::create([
            'name' => 'Maria Salvatierra Torrez',
            'email' => 'maria-salvatierra@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74185857',
            'departamentos_id' => 4
        ]);

        User::create([
            'name' => 'Pedro Burgoa',
            'email' => 'pedro-burgoa@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '74196965',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Jose Valverde',
            'email' => 'jose-valverde@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63152954',
            'departamentos_id' => 5
        ]);
        User::create([
            'name' => 'Sebastian Medrano Peres',
            'email' => 'sebastian-medrano@gmail.com',
            'password' => $password,
            'foto' => null,
            'telefono' => '63120987',
            'departamentos_id' => 5
        ]);

    }
}
