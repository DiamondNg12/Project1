<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        $id = auth()->user()->id;
        $data = User::with('roles')->findOrFail($id);

        $profileImage = getSingleMedia($data, 'profile_image');
        $auth = auth()->user();

        return view('thongTinSinhVien.list', compact('data', 'profileImage', 'auth'));
    }
}
