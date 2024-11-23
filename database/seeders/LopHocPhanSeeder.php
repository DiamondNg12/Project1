<?php

namespace Database\Seeders;

use App\Models\LopHocPhan;
use Illuminate\Database\Seeder;

class LopHocPhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lop_hoc_phans = [
            [
              'ma_lop_hoc_phan' => 'KPDL-1-1-24(N01)',
              'ten_lop_hoc_phan' => 'Khai phá dữ liệu-1-1-24(N01)',
              'ngay_bat_dau' => '2024-08-08',
              'ngay_ket_thuc' =>'2024-11-27',
              'dia_diem_hoc' => '402-A7',
              'hoc_ki' => '1',
              'dot_hoc' => 1,
              'ma_mon_hoc_id' => 1,
              'ma_khoa_hoc_id' => 2,
              'sv_toi_da' => '70',
              'giang_vien' => 1,
            ],
            [
                'ma_lop_hoc_phan' => 'CNJV-1-2-23(N01)',
                'ten_lop_hoc_phan' => 'Công nghệ Java-1-2-23(N01)',
                'ngay_bat_dau' => '2023-12-08',
                'ngay_ket_thuc' =>'2024-03-27',
                'dia_diem_hoc' => '203-A5',
                'hoc_ki' => '2',
                'dot_hoc' => 1,
                'ma_mon_hoc_id' => 2,
                'ma_khoa_hoc_id' => 2,
                'sv_toi_da' => '70',
                'giang_vien' => 1,
            ],
            [
                'ma_lop_hoc_phan' => 'PLDC-1-2-23(N01)',
                'ten_lop_hoc_phan' => 'Pháp luật đại cương-1-2-23(N01)',
                'ngay_bat_dau' => '2023-12-08',
                'ngay_ket_thuc' =>'2024-03-27',
                'dia_diem_hoc' => '303-A5',
                'hoc_ki' => '2',
                'dot_hoc' => 1,
                'ma_mon_hoc_id' => 5,
                'ma_khoa_hoc_id' => 1,
                'sv_toi_da' => '40',
                'giang_vien' => 1,
            ],
            [
                'ma_lop_hoc_phan' => 'TTHCM-1-2-24(N01)',
                'ten_lop_hoc_phan' => 'Tư tưởng Hồ Chí Minh-1-2-24(N01)',
                'ngay_bat_dau' => '2024-12-08',
                'ngay_ket_thuc' =>'2025-03-27',
                'dia_diem_hoc' => '204-A8',
                'hoc_ki' => '2',
                'dot_hoc' => 1,
                'ma_mon_hoc_id' => 4,
                'ma_khoa_hoc_id' => 3,
                'sv_toi_da' => '80',
                'giang_vien' => 1,
            ]

        ];
        foreach($lop_hoc_phans as $key => $value){
            $lop_hoc_phan = LopHocPhan::create($value);
        }
    }
}
