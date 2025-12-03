<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dormitory_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('hoc_ky_id')->constrained('hoc_kys');
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('bed_id')->constrained('beds');

            $table->string('card_number', 50)->nullable(); // mã thẻ
            $table->date('check_in_date');
            $table->date('check_out_date')->nullable();
            $table->text('reason_leave')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dormitory_records');
    }
};
