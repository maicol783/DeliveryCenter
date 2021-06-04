<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barrio\Barrio;

class BarriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barrio::create([
            'nombre_barrio'=> 'Manrique',
        ]);

        Barrio::create([
            'nombre_barrio'=> 'Castilla',
        ]);
    }
}
