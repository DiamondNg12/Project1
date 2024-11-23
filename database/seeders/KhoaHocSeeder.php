<?php

namespace Database\Seeders;

use App\Models\KhoaHoc;
use Illuminate\Database\Seeder;

class KhoaHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khoa_hocs = [
            [
                'ma_khoa_hoc' => 'K61',
                'ten_khoa_hoc' => 'Khóa 61',
                'ngay_bat_dau'=> '2020-09-12',
            ],
            [
                'ma_khoa_hoc' => 'K62',
                'ten_khoa_hoc' => 'Khóa 62',
                'ngay_bat_dau'=> '2021-09-15',
            ],
            [
                'ma_khoa_hoc' => 'K63',
                'ten_khoa_hoc' => 'Khóa 63',
                'ngay_bat_dau'=> '2022-09-14',
            ],
            [
                'ma_khoa_hoc' => 'K64',
                'ten_khoa_hoc' => 'Khóa 64',
                'ngay_bat_dau'=> '2023-09-25',
            ],
            [
                'ma_khoa_hoc' => 'K65',
                'ten_khoa_hoc' => 'Khóa 65',
                'ngay_bat_dau'=> '2024-09-22',
            ]
            ];
            foreach ($khoa_hocs as $key => $value) {
                $khoa_hoc = KhoaHoc::create($value);

            }
    }
}
