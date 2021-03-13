<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_productos', function (Blueprint $table) {
            $table->increments('id_entradaProducto');
            $table->integer('cantidad_agregar');
            $table->date('fecha_agregar');
            $table->double('valor_producto', $precision = 8, $scale = 2);
            $table->string('documento_empleado',20);
            $table->foreign('documento_empleado')->references('documento')->on('empleados');
            $table->integer('id_precioProducto')->unsigned();
            $table->foreign('id_precioProducto')->references('id_precioProducto')->on('precio_productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_productos');
    }
}
