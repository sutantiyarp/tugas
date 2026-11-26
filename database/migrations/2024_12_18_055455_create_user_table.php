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
        Schema::create('user', function (Blueprint $table) {
            // Mengubah id_user menjadi auto-increment
            $table->increments('id_user');  // Kolom auto-increment dan primary key
            $table->string('nama_user', 255);
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('email', 255)->nullable();
            $table->string('id_jenis_user', 10);
            $table->timestamps();
    
            $table->foreign('id_jenis_user')->references('id_jenis_user')->on('jenis_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
