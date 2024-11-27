<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhoaDaoTao;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = 'mon_hocs';

    protected $fillable = [
        'ma_mon_hoc',
        'ten_mon_hoc',
        'so_tin_chi',
        'ma_khoa_dao_tao_id'
    ];
     public function khoaDaoTao() {
        return $this->hasOne(KhoaDaoTao::class, 'id', 'ma_khoa_dao_tao_id');
    }
}
