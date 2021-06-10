<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Estado::create([
            
            'nombre_estado'=> 'En espera',
        ]);

        Estado::create([
            
            'nombre_estado'=> 'Confirmado',
        ]);

        Estado::create([
            
            'nombre_estado'=> 'Inconveninente',
        ]);

        Estado::create([
           
            'nombre_estado'=> 'Enviado',
        ]);

        Estado::create([
            
            'nombre_estado'=> 'Entregado',
        ]);

        Estado::create([
            
            'nombre_estado'=> 'Cancelado',
        ]);
    }
}
