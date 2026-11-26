<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            // Mengubah kolom 'id_user' menjadi auto-increment
            $table->increments('id_user')->change();
        });
    }
    
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            // Kembalikan perubahan jika rollback dilakukan
            $table->string('id_user')->change();
        });
    }
};
