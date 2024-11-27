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
    // protected $table = 'mon_hocs';

    // protected $fillable = [
    //     'ma_mon_hoc',
    //     'ten_mon_hoc',
    //     'so_tin_chi',
    //     'ma_khoa_dao_tao_id'
    // ];
    public function monHoc() {
        return $this->hasOne(MonHoc::class, 'id', 'ma_mon_hoc_id');
    }
    public function khoaHoc() {
        return $this->hasOne(KhoaHoc::class, 'id', 'ma_khoa_hoc_id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'giang_vien')->where('user_type', 'demo_admin');
    }
}
