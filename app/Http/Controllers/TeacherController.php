<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function indexTeacher(Request $request)
    {
        return view('teacher.list');
    }
}
