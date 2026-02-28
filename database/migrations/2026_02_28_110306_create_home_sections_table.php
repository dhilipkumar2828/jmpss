<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->enum('section_type', ['principal', 'correspondent', 'hero', 'about']);
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('quote')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sections');
    }
};
