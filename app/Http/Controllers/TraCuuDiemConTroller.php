<?php

namespace App\Http\Controllers;

use App\Models\KetQuaDangKi;
use Illuminate\Http\Request;

class TraCuuDiemController extends Controller
{
    public function index(Request $request){
        $ket_qua_dang_kis = KetQuaDangKi::with('diemMonHoc', 'lopHocPhan')->where('user_id', auth()->id())->get();
        return view('traCuuDiem.list', compact('ket_qua_dang_kis'));
    }
}
