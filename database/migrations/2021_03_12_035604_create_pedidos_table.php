<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id_pedido');
            $table->date('fecha');
            $table->integer('id_sede')->unsigned();
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
            $table->integer('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->string('documento_cliente',20);
            $table->string('nombre_cliente',35);
            $table->string('apellido_cliente',35);
            $table->string('direccion_cliente',25);
            $table->string('telefono_cliente',25);
            $table->float('total', 8, 2);
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
        Schema::dropIfExists('pedidos');
    }
}
