<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PersonalProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo tài khoản sinh viên test
        $user = User::firstOrCreate(
            ['email' => 'student@test.com'],
            [
                'password' => Hash::make('123456'),
                'role' => 'student',
            ]
        );

        // Tạo hồ sơ cá nhân cho sinh viên
        PersonalProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => 'Nguyễn Văn Test',
                'student_code' => '20240001',
                'dob' => '2004-01-15',
                'gender' => 'Nam',
                'phone' => '0123456789',
                'address' => '123 Đường Test, TP HCM',
                'hometown' => 'Thành phố Hồ Chí Minh',
                'year_admission' => 2024,
                'class_name' => 'CNTT-01',
                'department' => 'Công Nghệ Thông Tin',
            ]
        );

        // Tạo tài khoản admin test
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]
        );

        echo "✓ Tài khoản sinh viên: student@test.com (pass: 123456)\n";
        echo "✓ Tài khoản admin: admin@test.com (pass: 123456)\n";
    }
}
