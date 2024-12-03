<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQuaDangKi extends Model
{
    use HasFactory;

    public function lopHocPhan()
    {
        return $this->belongsTo(LopHocPhan::class, 'lop_hoc_phan_id');
    }

    public function giangVien()
    {
        return $this->belongsTo(User::class, 'giang_vien');
    }
}
