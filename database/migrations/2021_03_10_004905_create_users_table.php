<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('documento',20)->primary();
            $table->string('name',20);
            $table->string('segundo_nombre',20);
            $table->string('primer_apellido',20);
            $table->string('segundo_apellido',20);
            $table->string('celular',20);
            $table->string('telefono',20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('grupo_sanguineo',10);
            $table->integer('id_sede')->unsigned();
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
            $table->string('estatus');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
