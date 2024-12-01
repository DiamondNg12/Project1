<?php

namespace App\Http\Controllers;

use App\Models\KhoaDaoTao;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Http\Request;

class KhoaDaoTaoController extends Controller
{
    public function index(Request $request)
    {
        $khoa_dao_taos = KhoaDaoTao::all();
        return view('khoaDaoTao.list', compact('khoa_dao_taos'));
    }

    public function store(Request $request)
    {
        try {
            $check = KhoaDaoTao::where('ma_khoa_dao_tao', $request->ma_khoa_dao_tao)->first();
            if ($check) {
                session()->flash('error', 'Mã khoa đào tạo đã tồn tại!');
                return redirect()->route('khoa-dao-tao.index');
            }

            $khoa_dao_tao_moi = [
                'ma_khoa_dao_tao' => $request->ma_khoa_dao_tao,
                'ten_khoa_dao_tao' => $request->ten_khoa_dao_tao,
                'ngay_thanh_lap' => $request->ngay_thanh_lap,
                'tinh_trang' => 1
            ];
            $khoa_dao_tao = KhoaDaoTao::create($khoa_dao_tao_moi);
            if ($khoa_dao_tao) {
                session()->flash('success', 'Thêm mới khoa đào tạo thành công!');
            } else {
                session()->flash('error', 'Thêm mới khoa đào tạo thất bại!');
            }
            return redirect()->route('khoa-dao-tao.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('khoa-dao-tao.index');
        }
    }

    public function update($khoa_dao_tao, Request $request){
        try{
            $khoa_dao_tao = KhoaDaoTao::find($khoa_dao_tao);
            if($khoa_dao_tao){
                $khoa_dao_tao->update([
                    'ma_khoa_dao_tao' => $request->ma_khoa_dao_tao ?? $khoa_dao_tao->ma_khoa_dao_tao,
                    'ten_khoa_dao_tao' => $request->ten_khoa_dao_tao ?? $khoa_dao_tao->ten_khoa_dao_tao,
                    'ngay_thanh_lap' => $request->ngay_thanh_lap ?? $khoa_dao_tao->ngay_thanh_lap
                ]);
                session()->flash('success', 'Cập nhật khoa đào tạo thành công.');
            }else{
                session()->flash('error', 'Cập nhật khoa đào tạo thất bại.');
            }
            return redirect()->route('khoa-dao-tao.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại.');
            return redirect()->route('khoa-dao-tao.index');
        }
    }

    public function destroy($khoa_dao_tao){
        try{
            $khoa_dao_tao = KhoaDaoTao::find($khoa_dao_tao);
            if($khoa_dao_tao){
                $khoa_dao_tao->delete();
                session()->flash('success', 'Xoá khoa đào tạo thành công!');
            }else{
                session()->flash('error', 'Xoá khoa đào tạo thất bại!');
            }
            return redirect()->route('khoa-dao-tao.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Có lỗi xảy ra, vui lòng thử lại.');
            return redirect()->route('khoa-dao-tao.index');
        }
    }
}
