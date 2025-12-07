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

            // Thông tin sinh viên gửi đơn
            $table->string('full_name');
            $table->string('student_code', 50);
            $table->string('gender', 10)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();

            // Lý do xin vào KTX
            $table->text('reason')->nullable();

            // CỨ TẠO CỘT priority_level_id, KHÔNG GẮN FK Ở ĐÂY
            $table->unsignedBigInteger('priority_level_id')->nullable();

            // Trạng thái
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending');

            // Ghi chú + admin xử lý
            $table->text('note')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->text('rejected_reason')->nullable();

            $table->timestamps();

            // INDEX
            $table->index('student_code');
            $table->index('priority_level_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('register_requests');
    }
};
