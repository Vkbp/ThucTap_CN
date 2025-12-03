<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('register_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('student_code', 50);
            $table->string('gender', 10)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->text('reason')->nullable();
            $table->string('priority_type', 100)->nullable(); // yêu cầu giữ
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index('student_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('register_requests');
    }
};
