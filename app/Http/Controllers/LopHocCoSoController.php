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


   
}
