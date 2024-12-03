<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemMonHoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'dang_ki_id',
        'diem_qua_trinh',
        'diem_thi',
        'diem_tong_ket',
        'updated_by'
    ];
}
