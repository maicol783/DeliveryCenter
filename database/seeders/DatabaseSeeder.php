<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(TodosSeeder::class);
        $this->call(BarriosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(Sedes::class);
        $this->call(EstadosSeeder::class);
        $this->call(ProductosSeeder::class);
    }
}
