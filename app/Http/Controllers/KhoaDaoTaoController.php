<?php

namespace App\Http\Controllers;

use App\Models\KhoaDaoTao;
use Illuminate\Http\Request;

class KhoaDaoTaoController extends Controller
{
    public function index(Request $request)
    {
        $khoa_dao_taos = KhoaDaoTao::all();
        return view('khoaDaoTao.list', compact('khoa_dao_taos'));
    }
}
