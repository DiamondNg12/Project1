<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use App\Models\KhoaDaoTao;

use Flasher\Toastr\Laravel\Facade\Toastr;
class MonHocController extends Controller
{
    public function index(Request $request)
    {
        $mon_hocs = MonHoc::all();
        $khoa_dao_taos = KhoaDaoTao::all();
        return view('monHoc.list', compact('mon_hocs','khoa_dao_taos'));
    }
    public function store(Request $request)
    {
        try {
            $check = MonHoc::where('ma_mon_hoc', $request->ma_mon_hoc)->first();
            if ($check) {
                session()->flash('error', 'Mã môn học đã tồn tại!');
                return redirect()->route('mon-hoc.index');
            }

            $mon_hoc_moi = [
                'ma_mon_hoc' => $request->ma_mon_hoc,
                'ten_mon_hoc' => $request->ten_mon_hoc,
                'so_tin_chi' => $request->so_tin_chi,
                'ma_khoa_dao_tao_id' => $request->ma_khoa_dao_tao_id
            ];
            $mon_hoc = MonHoc::create($mon_hoc_moi);
            if ($mon_hoc) {
                session()->flash('success', 'Thêm mới môn học thành công!');
            } else {
                session()->flash('error', 'Thêm mới môn học thất bại!');
            }
            return redirect()->route('mon-hoc.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('mon-hoc.index');
        }
    }
    public function update($mon_hoc, Request $request){
        try{
            $mon_hoc = MonHoc::find($mon_hoc);
            if($mon_hoc){
                $mon_hoc->update([
                    'ma_mon_hoc' => $request->ma_mon_hoc ?? $mon_hoc->ma_mon_hoc,
                    'ten_mon_hoc' => $request->ten_mon_hoc ?? $mon_hoc->ten_mon_hoc,
                    'so_tin_chi' => $request->so_tin_chi ?? $mon_hoc->so_tin_chi,
                    'ma_khoa_dao_tao_id' => $request->ma_khoa_dao_tao_id ?? $mon_hoc->ma_khoa_dao_tao_id
                ]);
                session()->flash('success', 'Cập nhật môn học thành công!');
            }else{
                session()->flash('error', 'Cập nhật môn học thất bại!');
            }
            return redirect()->route('mon-hoc.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('mon-hoc.index');
        }
    }
    public function destroy($mon_hoc){
        try{
            $mon_hoc = MonHoc::find($mon_hoc);
            if($mon_hoc){
                $mon_hoc->delete();
                session()->flash('success', 'Xóa môn học thành công!');
            }else{
                session()->flash('error', 'Xóa môn học thất bại!');
            }
            return redirect()->route('mon-hoc.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('mon-hoc.index');
        }
    }

    public function getMonHocByKhoaDaoTao(Request $request){
        $mon_hocs = MonHoc::where('ma_khoa_dao_tao_id', $request->khoa_dao_tao_id)->get();
        return view('diemMonHoc.selectors.mon_hoc_selector', compact('mon_hocs'));
    }

}

