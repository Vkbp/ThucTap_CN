<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('register_requests', function (Blueprint $table) {

            // Đảm bảo cột tồn tại trước khi gắn khóa ngoại
            if (Schema::hasColumn('register_requests', 'priority_level_id')) {
                $table->foreign('priority_level_id')
                      ->references('id')->on('priority_levels')
                      ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('register_requests', function (Blueprint $table) {
            $table->dropForeign(['priority_level_id']);
        });
    }
};
