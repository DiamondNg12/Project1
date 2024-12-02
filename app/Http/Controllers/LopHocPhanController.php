<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use App\Models\LopHocPhan;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use App\Models\User;
use Flasher\Toastr\Laravel\Facade\Toastr;

class LopHocPhanController extends Controller
{
    public function index(Request $request)
    {
        $lop_hoc_phans = LopHocPhan::all();
        $mon_hocs =MonHoc::all();
        $khoa_hocs = KhoaHoc::all();
        $giang_vien = User::where('user_type', 'demo_admin')->get();
        return view('lopHocPhan.list', compact('lop_hoc_phans','mon_hocs','khoa_hocs','giang_vien'));
    }
    public function store(Request $request){
        try {
           // dd($request->all()); 
            
            $check = LopHocPhan::where('ma_lop_hoc_phan', $request->ma_lop_hoc_phan)->first();
            if ($check) {
                session()->flash('error', 'Mã lớp học phần đã tồn tại!');
                return redirect()->route('lop-hoc-phan.index');
            }

            $lop_hoc_phan_moi = [
                'ma_lop_hoc_phan' => $request->ma_lop_hoc_phan,
                'ten_lop_hoc_phan' => $request->ten_lop_hoc_phan,
                'ngay_bat_dau' => $request->ngay_bat_dau,
                'ngay_ket_thuc' => $request->ngay_ket_thuc,
                'dia_diem_hoc' => $request->dia_diem_hoc,
                'hoc_ki' => $request->hoc_ki,
                'dot_hoc' => $request->dot_hoc,
                'ma_mon_hoc_id' => $request->ma_mon_hoc_id,
                'sv_toi_da' => $request->sv_toi_da,
                'giang_vien' => $request->giang_vien
            ];
            $lop_hoc_phan = LopHocPhan::create($lop_hoc_phan_moi);
            if ($lop_hoc_phan) {
                session()->flash('success', 'Thêm mới lớp học phần thành công!');
            } else {
                session()->flash('error', 'Thêm mới lớp học phần thất bại!');
            }
            return redirect()->route('lop-hoc-phan.index');
        } catch (\Exception $e) {
           
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('lop-hoc-phan.index');
        }
    }

    public function update($lop_hoc_phan, Request $request){
        try{
            $lop_hoc_phan = LopHocPhan::find($lop_hoc_phan);
            if($lop_hoc_phan){
                $lop_hoc_phan->update([
                    'ma_lop_hoc_phan' => $request->ma_lop_hoc_phan ?? $lop_hoc_phan->ma_lop_hoc_phan,
                    'ten_lop_hoc_phan' => $request->ten_lop_hoc_phan ?? $lop_hoc_phan->ten_lop_hoc_phan,
                    'ngay_bat_dau' => $request->ngay_bat_dau ?? $lop_hoc_phan->ngay_bat_dau,
                    'ngay_ket_thuc' => $request->ngay_ket_thuc ?? $lop_hoc_phan->ngay_ket_thuc,
                    'dia_diem_hoc' => $request->dia_diem_hoc ?? $lop_hoc_phan->dia_diem_hoc,
                    'hoc_ki' => $request->hoc_ki ?? $lop_hoc_phan->hoc_ki,
                    'dot_hoc' => $request->dot_hoc ?? $lop_hoc_phan->dot_hoc,
                    'ma_mon_hoc_id' => $request->ma_mon_hoc_id ?? $lop_hoc_phan->ma_mon_hoc_id,
                    'sv_toi_da' => $request->sv_toi_da ?? $lop_hoc_phan->sv_toi_da,
                    'giang_vien' => $request->giang_vien ?? $lop_hoc_phan->giang_vien
                ]);
                session()->flash('success', 'Cập nhật khoa đào tạo thành công!');
            }else{
                session()->flash('success', 'Cập nhật khoa đào tạo thất bại!');
            }
            return redirect()->route('lop-hoc-phan.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('lop-hoc-phan.index');
        }
    }
    public function destroy($lop_hoc_phan){
        try{
            $lop_hoc_phan = LopHocPhan::find($lop_hoc_phan);
            if($lop_hoc_phan){
                $lop_hoc_phan->delete();
                session()->flash('success', 'Xóa môn học thành công!');
            }else{
                session()->flash('error', 'Xóa môn học thất bại!');
            }
            return redirect()->route('lop-hoc-phan.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('lop-hoc-phan.index');
        }
    }

}
