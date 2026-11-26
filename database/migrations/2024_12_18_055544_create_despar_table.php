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
        Schema::create('despar', function (Blueprint $table) {
            $table->id('destination_id');
            $table->string('name', 255);
            $table->string('image');
            $table->text('description');
            $table->unsignedBigInteger('village_id');
            $table->decimal('price', 10, 2);
            $table->timestamps();
    
            $table->foreign('village_id')->references('village_id')->on('desa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despar');
    }
};
