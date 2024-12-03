<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQuaDangKi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_lop_hoc_phan_id',
        'user_id'
    ];

    public function lopHocPhan()
    {
        return $this->belongsTo(LopHocPhan::class, 'ma_lop_hoc_phan_id', 'id');
    }

    public function student(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function diemMonHoc(){
        return $this->belongsTo(DiemMonHoc::class, 'id', 'dang_ki_id');
    }
}
