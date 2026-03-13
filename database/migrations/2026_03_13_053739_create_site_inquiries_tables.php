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
        // Admissions
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('parent_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('grade_applying');
            $table->text('address')->nullable();
            $table->string('status')->default('pending'); // pending, reviewed, accepted, rejected
            $table->timestamps();
        });

        // Career Applications
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('position_applied');
            $table->string('resume_path')->nullable();
            $table->text('experience')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // Visit Requests (from Events page)
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->date('visit_date');
            $table->time('visit_time')->nullable();
            $table->text('purpose')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // Contact Messages
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
        Schema::dropIfExists('career_applications');
        Schema::dropIfExists('visit_requests');
        Schema::dropIfExists('contact_messages');
    }
};
