<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede\Sede;

class Sedes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create([
            
            'nombre_sede'=> 'La 45Gardel',
            'direccion_sede'=> 'Cra.45 #73-31',
            'id_barrio' => '1',
            'id_municipio'=>'1',
            'estatus'=> '1',
        ]);

        Sede::create([
            
            'nombre_sede'=> 'La65Castilla',
            'direccion_sede'=> 'Cra.65 #104-41',
            'id_barrio' => '1',
            'id_municipio'=>'1',
            'estatus'=> '1',
        ]);

        Sede::create([
           
            'nombre_sede'=> 'Elretiro',
            'direccion_sede'=> 'Cra.21 #19-51',
            'id_barrio' => '2',
            'id_municipio'=>'2',
            'estatus'=> '1',
        ]);
    }
}
