<?php

namespace Database\Seeders\tenant\bcp;

use App\Models\tenant\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //'descripcion' => 'Responsable de: Facturación, Fiscalidad, Cobros y pagos.'
         Departamento::create([
            'nombre' => 'Administración',
            'descripcion' => 'Donde se encuentra el personal de gerencia, subgerecia, etc'
            
        ]);
        Departamento::create([
            'nombre' => 'Finanzas',
            'descripcion' => 'Responsable de la movilización y administración de los recursos financieros del Banco'
        ]);
        Departamento::create([
            'nombre' => 'Creditos',
            'descripcion' => 'Su objetivo es la aplicación de la política de crédito de la empresa, con un coste acorde con el presupuestado.'
        ]);
        Departamento::create([
            'nombre' => 'Control y riesgo',
            'descripcion' => 'Analizan: segmentación de operaciones dentro y fuera de balance, controles actuales y potenciales y la gestión activa de posiciones.'
        ]);
        Departamento::create([
            'nombre' => 'RRHH',
            'descripcion' => 'Donde se encuentra el personal de rrhh.'           
        ]);
    }
}
