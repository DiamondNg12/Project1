<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemMonHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diem_mon_hocs', function (Blueprint $table) {
            $table->id();
            $table->double('diem_qua_trinh');
            $table->double('diem_thi');
            $table->double('diem_tong_ket');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ma_mon_hoc_id')->unsigned();
            $table->bigInteger('ma_lop_hoc_phan_id')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ma_mon_hoc_id')->references('id')->on('mon_hocs')->onDelete('cascade');
            $table->foreign('ma_lop_hoc_phan_id')->references('id')->on('lop_hoc_phans')->onDelete('cascade');
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
        Schema::dropIfExists('diem_mon_hocs');
    }
}
