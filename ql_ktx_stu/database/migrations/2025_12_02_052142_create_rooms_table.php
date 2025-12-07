<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('room_number')->unique();
        $table->string('gender', 10); // nam/nữ
        $table->integer('capacity')->default(10);
        $table->double('area')->nullable();
        $table->string('room_type', 100)->nullable();
        $table->text('description')->nullable();
        $table->integer('floor')->nullable();

        // THÊM DÒNG NÀY
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
