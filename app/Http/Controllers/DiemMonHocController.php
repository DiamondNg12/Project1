<?php

namespace App\Http\Controllers;

use App\Models\KetQuaDangKi;
use App\Models\KhoaDaoTao;
use App\Models\LopHocPhan;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class DiemMonHocController extends Controller
{
    public function index(Request $request)
    {
        $registered_list = [];
        $lop_hoc_phan_id = 0;
        $mon_hoc_id = 0;
        $khoa_dao_tao_id = 0;
        if($request->lop_hoc_phan_id){
            $lop_hoc_phan = LopHocPhan::find($request->lop_hoc_phan_id);
            if($lop_hoc_phan){
                $khoa_dao_tao_id = $lop_hoc_phan->monHoc->ma_khoa_dao_tao_id;
                $mon_hoc_id = $lop_hoc_phan->ma_mon_hoc_id;
                $lop_hoc_phan_id = $lop_hoc_phan->id;

                $mon_hocs = MonHoc::where('ma_khoa_dao_tao_id', $khoa_dao_tao_id)->get();
                $lop_hoc_phans = LopHocPhan::where('ma_mon_hoc_id', $mon_hoc_id)->get();

                $registered_list = KetQuaDangKi::with('student')->where('ma_lop_hoc_phan_id', $lop_hoc_phan_id)->get();
            }

        }

        $khoa_dao_taos = KhoaDaoTao::all();
        return view('diemMonHoc.index', compact('khoa_dao_taos', 'registered_list', 'lop_hoc_phan_id', 'mon_hoc_id', 'khoa_dao_tao_id', 'mon_hocs', 'lop_hoc_phans'));
    }

}
