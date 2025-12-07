<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('beds', function (Blueprint $table) {
    $table->id();

    // Liên kết phòng
    $table->foreignId('room_id')
          ->constrained('rooms')
          ->onDelete('cascade');

    // Mã giường (A, B, C, 1, 2,...)
    $table->string('bed_code', 50);

    // Trạng thái giường
    $table->enum('status', ['available', 'occupied', 'maintenance'])
          ->default('available');

    // Ghi chú
    $table->text('note')->nullable();

    $table->timestamps();

    // TỐI ƯU: mỗi phòng không được trùng mã giường
    $table->unique(['room_id', 'bed_code']);

    // Tối ưu truy vấn các giường theo phòng
    $table->index('room_id');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('beds');
    }
};
