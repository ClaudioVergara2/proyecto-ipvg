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
        Schema::create('arriving', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('lastname');
            $table->integer('rut')->unique();
            $table->unsignedBigInteger('patent');
            $table->string('email')->unique();
            $table->integer('fechaEntrega');
            $table->integer('fechaDevolucion');
            $table->timestamps();
            $table->foreign('patent')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arriving');
    }
};
