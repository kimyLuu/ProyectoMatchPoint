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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('court_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->integer('duration'); // Duración en minutos
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Estado de la reserva
            $table->timestamps();

             // Restricción para evitar duplicados en una pista a una hora específica
             $table->unique(['court_id', 'date', 'time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
