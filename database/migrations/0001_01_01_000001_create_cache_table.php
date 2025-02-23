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
        Schema::create('cache', function (Blueprint $collection) {
            $collection->string('key')->primary();
            $collection->mediumText('value');
            $collection->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $collection) {
            $collection->string('key')->primary();
            $collection->string('owner');
            $collection->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
