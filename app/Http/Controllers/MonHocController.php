<?php

namespace App\Http\Controllers;

use App\Models\MonHoc;
use Illuminate\Http\Request;
use App\Models\KhoaDaoTao;
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
        dd(request());
    }
    
}

