<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
    public function index(Request $request)
    {
        $khoa_hocs = KhoaHoc::all();
        return view('khoaHoc.list', compact('khoa_hocs'));
    
    }

    
    public function store(Request $request)
    {
        try {
            $check = KhoaHoc::where('ma_khoa_hoc', $request->ma_khoa_hoc)->first();
            if ($check) {
                Toastr::error('Mã khoá học đã tồn tại', 'Lỗi');
                return redirect()->route('khoa-hoc.index');
            }

            $khoa_hoc_moi = [
                'ma_khoa_hoc' => $request->ma_khoa_hoc,
                'ten_khoa_hoc' => $request->ten_khoa_hoc,
                'ngay_bat_dau' => $request->ngay_bat_dau,
            ];
            $khoa_hoc = KhoaHoc::create($khoa_hoc_moi);
            if ($khoa_hoc) {
                Toastr::success('Thêm mới khoá học thành công', 'Thành công');
            } else {
                Toastr::error('Thêm mới khoá học thất bại', 'Lỗi');
            }
            return redirect()->route('khoa-hoc.index');
        } catch (\Exception $e) {
            Toastr::error('Có lỗi xảy ra, vui lòng thử lại', 'Lỗi');
            return redirect()->route('khoa-hoc.index');
        }
    }



    public function update($khoa_hoc, Request $request){
        try{
            $khoa_hoc = KhoaHoc::find($khoa_hoc);
            if($khoa_hoc){
                $khoa_hoc->update([
                    'ma_khoa_hoc' => $request->ma_khoa_hoc ?? $khoa_hoc->ma_khoa_hoc,
                    'ten_khoa_hoc' => $request->ten_khoa_hoc ?? $khoa_hoc->ten_khoa_hoc,
                    'ngay_bat-dau' => $request->ngay_bat_dau ?? $khoa_hoc->ngay_bat_dau
                ]);
                Toastr::success('Cập nhật khoá học thành công', 'Thành công');
            }else{
                Toastr::error('Cập nhật khoá học thất bại', 'Lỗi');
            }
            return redirect()->route('khoa-hoc.index');

        } catch (\Exception $e) {
            Toastr::error('Có lỗi xảy ra, vui lòng thử lại', 'Lỗi');
            return redirect()->route('khoa-hoc.index');
        }
    }

    public function destroy($khoa_hoc){
        try{
            $khoa_hoc = KhoaHoc::find($khoa_hoc);
            if($khoa_hoc){
                $khoa_hoc->delete();
                Toastr::success('Xóa khoá học thành công', 'Thành công');
            }else{
                Toastr::error('Xóa khoá học thất bại', 'Lỗi');
            }
            return redirect()->route('khoa-hoc.index');
        } catch (\Exception $e) {
            Toastr::error('Có lỗi xảy ra, vui lòng thử lại', 'Lỗi');
            return redirect()->route('khoa-hoc.index');
        }
    }
}
