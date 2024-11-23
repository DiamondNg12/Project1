<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mon_hoc = [
            [
                'ma_mon_hoc' => 'KPDL',
                'ten_mon_hoc' => 'Khai phá dữ liệu',
                'so_tin_chi' => 3,
                'ma_khoa_dao_tao_id' => 1,
            ],
            [
                'ma_mon_hoc' => 'CNJV',
                'ten_mon_hoc' => 'Công nghệ Java',
                'so_tin_chi' => 3,
                'ma_khoa_dao_tao_id' => 1,
            ],
            [
                'ma_mon_hoc' => 'TTHCM',
                'ten_mon_hoc' => 'Tư tưởng Hồ Chí Minh',
                'so_tin_chi' => 2,
                'ma_khoa_dao_tao_id' => 3,
            ],
            [
                'ma_mon_hoc' => 'THMLNL',
                'ten_mon_hoc' => 'Triết học Mác-Lênin',
                'so_tin_chi' => 3,
                'ma_khoa_dao_tao_id' => 4,
            ],
            [
                'ma_mon_hoc' => 'PLDC',
                'ten_mon_hoc' => 'Pháp luật đại cương',
                'so_tin_chi' => 1,
                'ma_khoa_dao_tao_id' => 1,
            ],
        ];
        foreach($mon_hoc as $key => $value){
            $mon_hoc = MonHoc::create($value);
    }
}
}
