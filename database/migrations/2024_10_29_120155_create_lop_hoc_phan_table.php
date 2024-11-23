<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocPhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hoc_phans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_lop_hoc_phan');
            $table->string('ten_lop_hoc_phan');
            $table->string('ngay_bat_dau');
            $table->string('ngay_ket_thuc');
            $table->string('dia_diem_hoc');
            $table->string('hoc_ki');
            $table->integer('dot_hoc');
            $table->bigInteger('ma_mon_hoc_id')->unsigned();
            $table->bigInteger('ma_khoa_hoc_id')->unsigned();
            $table->string('sv_toi_da');
            $table->bigInteger('giang_vien')->unsigned();
            $table->foreign('ma_mon_hoc_id')->references('id')->on('mon_hocs');
            $table->foreign('ma_khoa_hoc_id')->references('id')->on('khoa_hocs');
            $table->foreign('giang_vien')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop_hoc_phan');
    }
}
