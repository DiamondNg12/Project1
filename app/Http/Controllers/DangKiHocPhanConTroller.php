<?php

namespace App\Http\Controllers;

use App\Models\KetQuaDangKi;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;

class DangKiHocPhanController extends Controller
{
    public function index(Request $request)
    {
        $now = date('Y-m-d');
        $auth_id = auth()->id();
        $data = LopHocPhan::with(['monHoc', 'monHoc.khoaDaoTao', 'giangVien'])
                ->where('mo_dang_ki', '<', $now)
                ->where('dong_dang_ki', '>', $now)
                ->get();
        return view('dangKiHocPhan.list', compact('data'));
    }

    public function store(Request $request){
        try {
            $class_id = $request->class_id;
            $check = KetQuaDangKi::where('ma_lop_hoc_phan_id', $class_id)->where('user_id', auth()->id())->first();
            if($check){
                session()->flash('error', 'Bạn đã đăng kí lớp học phần này rồi!');
                return redirect()->route('dang-ki-hoc-phan.index');
            }
            $new_data = [
                'ma_lop_hoc_phan_id' => $class_id,
                'user_id' => auth()->id()
            ];
            $data = KetQuaDangKi::create($new_data);
            if($data){
                session()->flash('success', 'Đăng kí lớp học phần thành công!');
            }else{
                session()->flash('error', 'Đăng kí lớp học phần thất bại!');
            }
            return redirect()->route('dang-ki-hoc-phan.index');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('dang-ki-hoc-phan.index');
        }
    }
}
