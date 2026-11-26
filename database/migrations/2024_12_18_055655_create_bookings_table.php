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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedInteger('id_user'); // Kolom id_user dengan tipe unsignedInteger
            $table->unsignedBigInteger('destination_id');
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->timestamps();
    
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('destination_id')->references('destination_id')->on('despar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
