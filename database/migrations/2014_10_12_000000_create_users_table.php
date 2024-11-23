<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('avatar')->default('images/avatars/01.png');
            $table->string('code');
            $table->bigInteger('lop_hoc_co_so_id')->unsigned();
            $table->bigInteger('khoa_dao_tao_id')->unsigned();
            $table->bigInteger('khoa_hoc_id')->unsigned();
            $table->string('email')->unique();
            $table->string('cccd')->unique();
            $table->string('tinh_trang')->default(1)->comment('1: Đang hoạt động, 0: Không hoạt động');
            $table->integer('gioi_tinh')->default(1)->comment('1: Nam, 0: Nữ');
            $table->string('dia_chi')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type')->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
