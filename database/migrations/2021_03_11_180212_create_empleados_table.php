<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->string('documento',20);
            $table->string('primer_nombre',20);
            $table->string('segundo_nombre',20);
            $table->string('primer_apellido',20);
            $table->string('segundo_apellido',20);
            $table->string('celular',20);
            $table->string('telefono',20);
            $table->string('correo',45)->unique();
            $table->string('contraseña',30);
            $table->string('grupo_sanguineo',10);
            $table->integer('id_sede');
            $table->integer('id_rol');
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
        Schema::dropIfExists('empleados');
    }
}
