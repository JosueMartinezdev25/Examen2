<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('identidad', 13)->unique();
        $table->string('nombre', 255);
        $table->string('apellido',255);
        $table->string('correo',255);
        $table->string('cargo',50);
        $table->decimal('salario',10,2)->default(0);
        $table->integer('estado')->default(1);
        $table->date('fecha_ingreso');
        $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
