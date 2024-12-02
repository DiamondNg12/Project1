<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MonHoc;
use App\Models\KhoaHoc;
//use App\Models\User;

class LopHocPhan extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc_phans';

    protected $fillable = [
        'ma_lop_hoc_phan',
        'ten_lop_hoc_phan',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'dia_diem_hoc',
        'hoc_ki',
        'dot_hoc',
        'ma_mon_hoc_id', 
        'sv_toi_da',
        'giang_vien'
    ];
    public function monHoc() {
        return $this->hasOne(MonHoc::class, 'id', 'ma_mon_hoc_id');
    }
    public function khoaHoc() {
        return $this->hasOne(KhoaHoc::class, 'id', 'ma_khoa_hoc_id');
    }
    public function user() {
        // return $this->hasOne(User::class, 'id', 'giang_vien')->where('user_type', 'demo_admin');
        return $this->hasOne(User::class, 'id', 'giang_vien');
    }
}
