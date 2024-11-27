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

    }
}
