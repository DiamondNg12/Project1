<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhoaDaoTao;
use App\Models\KhoaHoc;

class LopHocCoSo extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc_co_sos';

    protected $fillable = [
        'ma_lop_hoc',
        'ten_lop_hoc',
        'co_van_hoc_tap',
        'ma_khoa_dao_tao_id',
        'ma_khoa_hoc_id'

        
    ];
    public function khoaDaoTao() {
        return $this->hasOne(KhoaDaoTao::class, 'id', 'ma_khoa_dao_tao_id');
    }
    public function khoaHoc() {
        return $this->hasOne(KhoaHoc::class, 'id', 'ma_khoa_hoc_id');
    }
    public function user() {
        // return $this->hasOne(User::class, 'id', 'giang_vien')->where('user_type', 'demo_admin');
        return $this->hasOne(User::class, 'id', 'co_van_hoc_tap');
    }
}
