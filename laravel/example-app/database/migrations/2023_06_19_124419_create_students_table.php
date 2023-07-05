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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number', 20);
            $table->string('email')->unique();
            $table->enum('branch_select', ['ECE', 'CSE', 'EEE', 'AE', 'ME', 'BME'])->default('CSE');
            $table->boolean('hostel')->default(0);
            $table->json('add_subjects', 'Cyber-security', 'Artificial-Intelligence', 'Block-chain', 'IoT', 'Robotics')->nullable();
            $table->text('permanent_address');
            $table->urldecode('action');


            // $table->timestamps();
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
