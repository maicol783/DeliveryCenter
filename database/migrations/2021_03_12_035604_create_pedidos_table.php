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
            $table->string('primerNombre_cliente',25);
            $table->string('segundoNombre_cliente',25);
            $table->string('primerApellido_cliente',25);
            $table->string('segundoApellido_cliente',25);
            $table->string('direccion_cliente',25);
            $table->string('telefono_cliente',25);
            $table->string('celular_cliente',25);
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
