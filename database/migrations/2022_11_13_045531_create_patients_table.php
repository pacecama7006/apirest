<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 150);
            $table->string('edad', 5);
            $table->char('sexo', 2);
            $table->string('curp', 20)->unique();
            $table->string('tipo_sangre', 5);
            $table->string('telefono', 15);
            $table->string('correo', 150);
            $table->string('direccion', 150);
            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
};
