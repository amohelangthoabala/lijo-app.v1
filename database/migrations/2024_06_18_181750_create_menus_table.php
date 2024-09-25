<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id'); // Foreign key to the restaurants table
            $table->string('name'); // Menu name
            $table->text('description')->nullable(); // Menu description, can be null
            $table->decimal('price', 10, 2); // Menu item price, format (10 digits, 2 decimals)
            $table->string('image_url')->nullable(); // URL for menu item image, can be null
            $table->json('availability')->nullable(); // Optional JSON field for storing availability info (e.g., days available)
            $table->timestamps(); // created_at and updated_at columns

            // Set the foreign key constraint to link menus with restaurants
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
