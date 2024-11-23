<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KhoaDaoTaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khoa_dao_tao = [
            [
                'ma_khoa_dao_tao' => 'CNTT',
                'ten_khoa_dao_tao' => 'Công nghệ thông tin',
                'ngay_thanh_lap' => '2003-12-09',
                'tinh_trang' => 1,
            ],
            [
                'ma_khoa_dao_tao' => 'DL',
                'ten_khoa_dao_tao' => 'Du lịch',
                'ngay_thanh_lap' => '2003-12-06',
                'tinh_trang' => 1,
            ],
            [
                'ma_khoa_dao_tao' => 'KHCB',
                'ten_khoa_dao_tao' => 'Khoa học cơ bản',
                'ngay_thanh_lap' => '2003-12-12',
                'tinh_trang' => 1,
            ],
            [
                'ma_khoa_dao_tao' => 'KTVT',
                'ten_khoa_dao_tao' => 'Kinh tế vận tải',
                'ngay_thanh_lap' => '2003-12-06',
                'tinh_trang' => 1,
            ],
            [
                'ma_khoa_dao_tao' => 'CK',
                'ten_khoa_dao_tao' => 'Cơ khí',
                'ngay_thanh_lap' => '2003-12-21',
                'tinh_trang' => 1,
            ]
            ];
            foreach($khoa_dao_tao as $key => $value){
                $khoa_dao_tao = KhoaDaoTao::create($value);
            }
    }
}
