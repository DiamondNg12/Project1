<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function indexMonHoc(Request $request)
    {
        return view('monHoc.list');
    }
}
