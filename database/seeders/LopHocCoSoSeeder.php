<?php

namespace Database\Seeders;

use App\Models\LopHocCoSo;
use Illuminate\Database\Seeder;

class LopHocCoSoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lop_hoc_co_sos = [
            [
                'ma_lop_hoc' => 'CNTT1',
                'ten_lop_hoc' => 'Công nghệ thông tin 1',
                'co_van_hoc_tap' => 2,
                'ma_khoa_dao_tao_id' => 1,
                'ma_khoa_hoc_id' => 2,
            ],
            [
                'ma_lop_hoc' => 'CNTT2',
                'ten_lop_hoc' => 'Công nghệ thông tin 2',
                'co_van_hoc_tap' => 2,
                'ma_khoa_dao_tao_id' => 1,
                'ma_khoa_hoc_id' => 2,
            ],
            [
                'ma_lop_hoc' => 'CK1',
                'ten_lop_hoc' => 'Cơ khí 1',
                'co_van_hoc_tap' => 2,
                'ma_khoa_dao_tao_id' => 5,
                'ma_khoa_hoc_id' => 1,
            ],
            [
                'ma_lop_hoc' => 'DL2',
                'ten_lop_hoc' => 'Du lịch 2',
                'co_van_hoc_tap' => 2,
                'ma_khoa_dao_tao_id' => 2,
                'ma_khoa_hoc_id' => 3,
            ],
            [
                'ma_lop_hoc' => 'KHCB3',
                'ten_lop_hoc' => 'Khoa học cơ bản 3',
                'co_van_hoc_tap' => 2,
                'ma_khoa_dao_tao_id' => 3,
                'ma_khoa_hoc_id' => 3,
            ]
            ];
            foreach($lop_hoc_co_sos as $key => $value){
                $lop_hoc_co_so = LopHocCoSo::create($value);
            }
    }
}
