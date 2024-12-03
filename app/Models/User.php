<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'username',
    //     'first_name',
    //     'last_name',
    //     'phone_number',
    //     'status',
    //     'banned',
    //     'email',
    //     'password',
    // ];
    protected $fillable = [
        'ho_ten', 'code', 'ngay_sinh', 'khoa_dao_tao_id',
        'khoa_hoc_id', 'lop_hoc_co_so_id', 'gioi_tinh',
        'email', 'user_type', 'password', 'tinh_trang'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $appends = ['full_name'];

    public function getRoleAttribute()
    {
        return $this->roles->first()->name;
    }

    public function khoaDaoTao()
    {
        return $this->hasOne(KhoaDaoTao::class, 'id', 'khoa_dao_tao_id');
    }
    public function khoaHoc()
    {
        return $this->hasOne(KhoaHoc::class, 'id', 'khoa_hoc_id');
    }
   
     public function lopHocCoSo()
    {
        return $this->hasOne(LopHocCoSo::class, 'id', 'lop_hoc_co_so_id');
    }
    // public function getFullNameAttribute()
    // {
    //     return $this->first_name . ' ' . $this->last_name;
    // }

    // public function userProfile() {
    //     return $this->hasOne(UserProfile::class, 'user_id', 'id');
    // }
}
