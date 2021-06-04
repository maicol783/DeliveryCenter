<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio\Municipio;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::create([
            'nombre_municipio'=> 'Medellin',
        ]);

        Municipio::create([
            'nombre_municipio'=> 'Bello',
        ]);
    }
}
