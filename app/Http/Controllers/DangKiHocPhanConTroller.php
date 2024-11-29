<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DangKiHocPhanController extends Controller
{
    public function index(Request $request){
        return view('dangKiHocPhan.list');
    }
}