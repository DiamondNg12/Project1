<?php

namespace App\Http\Controllers;

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
}
