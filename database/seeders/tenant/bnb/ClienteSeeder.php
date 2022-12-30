<?php

namespace Database\Seeders\tenant\bnb;

use App\Models\tenant\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(['user_id' => 11]);
        Cliente::create(['user_id' => 12]);
        Cliente::create(['user_id' => 13]);
        Cliente::create(['user_id' => 14]);
        Cliente::create(['user_id' => 15]);

    }
}
