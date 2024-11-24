<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhoaDaoTao;

class MonHoc extends Model
{
    use HasFactory;
     public function khoaDaoTao() {
        return $this->hasOne(KhoaDaoTao::class, 'id', 'ma_khoa_dao_tao_id');
    }
}
