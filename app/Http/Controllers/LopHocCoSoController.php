<?php

namespace App\Http\Controllers;

use App\Models\KhoaDaoTao;
use App\Models\LopHocCoSo;
use App\Models\KhoaHoc;
use App\Models\User;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

class LopHocCoSoController extends Controller
{
    public function index(Request $request)
    {
        $lop_hoc_co_sos = LopHocCoSo::all();
        $khoa_dao_taos = KhoaDaoTao::all();
        $khoa_hocs = KhoaHoc::all();
        $co_van_hoc_tap = User::where('user_type', 'demo_admin')->get();
        return view('lopHocCoSo.list', compact('lop_hoc_co_sos','co_van_hoc_tap','khoa_dao_taos','khoa_hocs'));
    }

    
    public function store(Request $request)
    {
        try {             
             $check = LopHocCoSo::where('ma_lop_hoc', $request->ma_lop_hoc)->first();
             if ($check) {
                 session()->flash('error', 'Mã lớp học đã tồn tại!');
                 return redirect()->route('lop-hoc-co-so.index');
             }
 
             $lop_hoc_co_so_moi = [
                 'ma_lop_hoc' => $request->ma_lop_hoc,
                 'ten_lop_hoc' => $request->ten_lop_hoc,
                 'co_van_hoc_tap' => $request->co_van_hoc_tap,
                 'ma_khoa_dao_tao_id' => $request->ma_khoa_dao_tao_id,
                 'ma_khoa_hoc_id' => $request->ma_khoa_hoc_id

                 
             ];
             $lop_hoc_co_so = LopHocCoSo::create($lop_hoc_co_so_moi);
             if ($lop_hoc_co_so) {
                 session()->flash('success', 'Thêm mới lớp học thành công!');
             } else {
                 session()->flash('error', 'Thêm mới lớp học thất bại!');
             }
             return redirect()->route('lop-hoc-co-so.index');
         } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            //  session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
             return redirect()->route('lop-hoc-co-so.index');
         }
    }

    public function update($lop_hoc_co_so, Request $request){
        try{
            $lop_hoc_co_so = LopHocCoSo::find($lop_hoc_co_so);
            if($lop_hoc_co_so){
                $lop_hoc_co_so->update([
                    'ma_lop_hoc' => $request->ma_lop_hoc ?? $lop_hoc_co_so->ma_lop_hoc,
                    'ten_lop_hoc' => $request->ten_lop_hoc ?? $lop_hoc_co_so->ten_lop_hoc,
                    'co_van_hoc_tap' => $request->co_van_hoc_tap ?? $lop_hoc_co_so->co_van_hoc_tap,
                    'ma_khoa_dao_tao_id' => $request->ma_khoa_dao_tao_id ?? $lop_hoc_co_so->ma_khoa_dao_tao_id,
                    'ma_khoa_hoc_id' => $request->ma_khoa_hoc_id ?? $lop_hoc_co_so->ma_khoa_hoc_id
                    
                ]);
                session()->flash('success', 'Cập nhật lớp học thành công!');
            }else{
                session()->flash('success', 'Cập nhật lớp học thất bại!');
            }
            return redirect()->route('lop-hoc-co-so.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('lop-hoc-co-so.index');
        }
    }

    public function destroy($lop_hoc_co_so){
        try{
            $lop_hoc_co_so = LopHocCoSo::find($lop_hoc_co_so);
            if($lop_hoc_co_so){
                $lop_hoc_co_so->delete();
                session()->flash('success', 'Xóa lớp học thành công!');
            }else{
                session()->flash('error', 'Xóa lớp học thất bại!');
            }
            return redirect()->route('lop-hoc-co-so.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('lop-hoc-co-so.index');
        }
    }
}