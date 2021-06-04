<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('nombre_producto',30);
            $table->integer('existencias');
            $table->float('valor_producto', 8, 2);
            $table->integer('id_sede')->unsigned();
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
            $table->string('estatus');
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
        Schema::dropIfExists('productos');
    }
}
