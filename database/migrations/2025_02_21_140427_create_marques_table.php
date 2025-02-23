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
        Schema::create('marques', function (Blueprint $table) {
            $table->string('nom');
            $table->string('image_nom');
            $table->string('image_chemin');
            $table->timestamp('created_at');
            $table->timestamp('update_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marques');
    }
};
