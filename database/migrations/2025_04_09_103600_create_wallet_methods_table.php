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
        Schema::create('wallet_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Bitcoin"
            $table->string('code'); // e.g., "bitcoin"
            $table->string('network')->nullable(); // e.g., "BEP20"
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_methods');
    }
};
