<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaDaoTao extends Model
{
    use HasFactory;

    protected $table = 'khoa_dao_taos';

    protected $fillable = [
        'ma_khoa_dao_tao',
        'ten_khoa_dao_tao',
        'ngay_thanh_lap',
        'tinh_trang'
    ];
}
