<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre_producto'=> '1\2 pollo',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '1',
            'estatus' => '1',
        ]);

        Producto::create([
            'nombre_producto'=> '1 pollo',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '1',
            'estatus' => '1',
        ]);

        Producto::create([
            'nombre_producto'=> '1\4 pollo',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '1',
            'estatus' => '1',
        ]);

        Producto::create([
            'nombre_producto'=> 'menudencia',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '3',
            'estatus' => '1',
        ]);

        Producto::create([
            'nombre_producto'=> '1\2 pollo',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '2',
            'estatus' => '1',
        ]);

        Producto::create([
            'nombre_producto'=> '1 pollo',
            'existencias' => '200',
            'valor_producto'=> '8000',
            'id_sede' => '2',
            'estatus' => '1',
        ]);

    }
}
