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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->nullable()->constrained(); // Ensure it refers to the correct table
            $table->enum('type', ['user', 'restaurant']); // Use enum for type
            $table->string('street')->nullable(); // Make nullable if necessary
            $table->string('city')->nullable(); // Make nullable if necessary
            $table->string('district')->nullable(); // Make nullable if necessary
            $table->string('postal_code')->nullable(); // Optional postal code
            $table->string('country')->nullable(); // Optional country
            $table->decimal('latitude', 10, 8)->nullable(); // Optional latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Optional longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
