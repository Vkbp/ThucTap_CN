<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('register_requests', function (Blueprint $table) {
            // rejected columns
            $table->unsignedBigInteger('rejected_by')->nullable()->after('approved_by');
            $table->timestamp('rejected_at')->nullable()->after('rejected_by');

            // optional: add foreign key constraint if users table exists
            if (Schema::hasTable('users')) {
                $table->foreign('rejected_by')
                      ->references('id')->on('users')
                      ->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('register_requests', function (Blueprint $table) {
            if (Schema::hasColumn('register_requests', 'rejected_by')) {
                // drop fk if exists (safe)
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $sm->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
                // Laravel will ignore missing foreign key name in many cases; simply drop column
                $table->dropColumn(['rejected_by','rejected_at']);
            }
        });
    }
};
