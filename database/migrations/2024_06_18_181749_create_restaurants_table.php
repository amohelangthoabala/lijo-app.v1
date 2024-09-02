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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->json('contact_information')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->json('opening_hours')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->integer('review_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->integer('visit_count')->default(0);
            $table->dateTime('last_activity_at')->nullable();
            $table->boolean('is_top_pick')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
