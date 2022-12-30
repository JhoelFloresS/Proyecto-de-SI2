<?php

namespace Database\Seeders\tenant\bnb;

use App\Models\tenant\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create(['user_id' => 1, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 2, 'profesion' => 'Analista de sistemas']);
        Empleado::create(['user_id' => 3, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 4, 'profesion' => 'Ingeniero Comercial']);
        Empleado::create(['user_id' => 5, 'profesion' => 'Secretaria']);
        Empleado::create(['user_id' => 6, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 7, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 8, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 9, 'profesion' => 'Contador']);
        Empleado::create(['user_id' => 10, 'profesion' => 'Contador']);
        
    }
}
