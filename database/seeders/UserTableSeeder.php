<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'ho_ten' => 'System Admin',
                'avatar' => 'images/avatars/01.png',
                'code' => '000000000',
                'lop_hoc_co_so_id' => 0,
                'khoa_dao_tao_id' => 0,
                'khoa_hoc_id' => 0,
                'email' => 'admin@example.com',
                'cccd' => '000000000000',
                'tinh_trang' => 1,
                'gioi_tinh' => 1,
                'dia_chi' => null,
                'ngay_sinh' => null,
                'so_dien_thoai' => null,
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'ho_ten' => 'Demo Admin',
                'avatar' => 'images/avatars/01.png',
                'code' => '100000000',
                'lop_hoc_co_so_id' => 0,
                'khoa_dao_tao_id' => 0,
                'khoa_hoc_id' => 0,
                'email' => 'demo@example.com',
                'cccd' => '100000000000',
                'tinh_trang' => 1,
                'gioi_tinh' => 1,
                'dia_chi' => null,
                'ngay_sinh' => null,
                'so_dien_thoai' => null,
                'email_verified_at' => now(),
                'user_type' => 'demo_admin',
                'password' => bcrypt('password'),
            ],
            [
                'ho_ten' => 'Demo Student',
                'avatar' => 'images/avatars/01.png',
                'code' => '200000000',
                'lop_hoc_co_so_id' => 0,
                'khoa_dao_tao_id' => 0,
                'khoa_hoc_id' => 0,
                'email' => 'user@example.com',
                'cccd' => '200000000000',
                'tinh_trang' => 1,
                'gioi_tinh' => 1,
                'dia_chi' => null,
                'ngay_sinh' => null,
                'so_dien_thoai' => null,
                'email_verified_at' => now(),
                'user_type' => 'user',
                'password' => bcrypt('password'),
            ]
        ];
        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole($value['user_type']);
        }
    }
}
