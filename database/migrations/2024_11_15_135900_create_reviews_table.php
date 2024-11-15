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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reviewable_id'); // Polymorphic ID
            $table->string('reviewable_type'); // Polymorphic type (e.g., App\Models\Restaurant, App\Models\Meal)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who wrote the review
            $table->unsignedTinyInteger('rating'); // Rating (1-5, for example)
            $table->text('review')->nullable(); // Review text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
