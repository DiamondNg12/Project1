<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhoaDaoTaoController extends Controller
{
    public function indexKhoaDaoTao(Request $request)
    {
        return view('khoaDaoTao.list');
    }
}
