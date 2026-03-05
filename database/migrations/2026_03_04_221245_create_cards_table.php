<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();

            // Usimamizi wa Wateja (Multi-tenancy)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('type')->default('individual');
            $table->string('template')->default('business_card'); // MPYA: Muonekano wa Kadi
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('color')->default('#0B1120');
            $table->text('bio')->nullable();
            $table->string('image')->nullable();

            // Social Media
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};