<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
    public function indexKhoaHoc(Request $request)
    {
        return view('khoaHoc.list');
    }
}
