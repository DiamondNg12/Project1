<?php

namespace App\Http\Controllers;

use App\Models\DiemMonHoc;
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
        $mon_hocs = [];
        $lop_hoc_phans = [];
        $lop_hoc_phan_id = 0;
        $mon_hoc_id = 0;
        $khoa_dao_tao_id = 0;
        if ($request->lop_hoc_phan_id) {
            $lop_hoc_phan = LopHocPhan::find($request->lop_hoc_phan_id);
            if ($lop_hoc_phan) {
                $khoa_dao_tao_id = $lop_hoc_phan->monHoc->ma_khoa_dao_tao_id;
                $mon_hoc_id = $lop_hoc_phan->ma_mon_hoc_id;
                $lop_hoc_phan_id = $lop_hoc_phan->id;

                $mon_hocs = MonHoc::where('ma_khoa_dao_tao_id', $khoa_dao_tao_id)->get();
                $lop_hoc_phans = LopHocPhan::where('ma_mon_hoc_id', $mon_hoc_id)->get();

                $registered_list = KetQuaDangKi::with('student', 'diemMonHoc')->where('ma_lop_hoc_phan_id', $lop_hoc_phan_id)->get();
            }
        }
        $khoa_dao_taos = KhoaDaoTao::all();
        return view('diemMonHoc.index', compact('khoa_dao_taos', 'registered_list', 'lop_hoc_phan_id', 'mon_hoc_id', 'khoa_dao_tao_id', 'mon_hocs', 'lop_hoc_phans'));
    }

    public function store(Request $request)
    {
        try {
            $diems = $request->diems;
            foreach ($diems as $dang_ki_id => $diem) {
                $diem_mon_hoc = DiemMonHoc::where('dang_ki_id', $dang_ki_id)->first();
                if ($diem_mon_hoc) {
                    $diem_mon_hoc->diem_qua_trinh = $diem['qua_trinh'] ?? $diem_mon_hoc->diem_qua_trinh;
                    $diem_mon_hoc->diem_thi = $diem['thi'] ?? $diem_mon_hoc->diem_thi;
                    $diem_mon_hoc->diem_tong_ket = $diem_mon_hoc->diem_qua_trinh && $diem_mon_hoc->diem_thi ? ($diem_mon_hoc->diem_qua_trinh + $diem_mon_hoc->diem_thi) / 2 : null;
                    $diem_mon_hoc->updated_by = auth()->id();
                } else {
                    DiemMonHoc::create([
                        'dang_ki_id' => $dang_ki_id,
                        'diem_qua_trinh' => $diem['qua_trinh'] ?? null,
                        'diem_thi' => $diem['thi'] ?? null,
                        'diem_tong_ket' => $diem['qua_trinh'] && $diem['thi'] ? ($diem['qua_trinh'] + $diem['thi']) / 2 : null,
                        'updated_by' => auth()->id()
                    ]);
                }
            }
            session()->flash('success', 'Cập nhật điểm thành công');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
