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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('password')->nullable();
            $table->string('password_plain')->nullable();
            $table->string('sex')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother__name')->nullable();
            $table->integer('religion_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('subjects')->nullable();
            $table->date('dob')->nullable();
            $table->date('doa')->nullable();
            $table->string('birth_certificate_no')->nullable();
            $table->tinyInteger('blood_group')->nullable();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('country_id')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('admin_group_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
