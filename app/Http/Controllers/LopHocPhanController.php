<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LopHocPhanController extends Controller
{
    public function indexLopHocPhan(Request $request)
    {
        return view('lopHocPhan.list');
    }
}
