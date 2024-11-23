<?php

namespace App\Http\Controllers;
use App\Models\KhoaHoc;
use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
    public function index(Request $request)
    {
        $khoa_hocs = KhoaHoc::all();
        return view('khoaHoc.list', compact('khoa_hocs'));
    
    }

    
    public function store(Request $request)
    {
      dd($request);  
    }
}
