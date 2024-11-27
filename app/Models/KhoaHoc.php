<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;

    protected $table = 'khoa_hocs';

    protected $fillable = [
        'ma_khoa_hoc',
        'ten_khoa_hoc',
        'ngay_bat_dau'
    ];
}
