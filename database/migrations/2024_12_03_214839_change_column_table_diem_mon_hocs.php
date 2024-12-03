<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTableDiemMonHocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diem_mon_hocs', function (Blueprint $table) {
            $table->dropForeign(['ma_mon_hoc_id']);
            $table->dropForeign(['ma_lop_hoc_phan_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn('ma_mon_hoc_id');
            $table->dropColumn('ma_lop_hoc_phan_id');
            $table->dropColumn('user_id');
            $table->unsignedBigInteger('dang_ki_id')->after('id');
            $table->foreign('dang_ki_id')->references('id')->on('ket_qua_dang_kis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diem_mon_hocs', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_mon_hoc_id')->after('id');
            $table->foreign('ma_mon_hoc_id')->references('id')->on('mon_hocs');
            $table->unsignedBigInteger('ma_lop_hoc_phan_id')->after('ma_mon_hoc_id');
            $table->foreign('ma_lop_hoc_phan_id')->references('id')->on('lop_hoc_phans');
            $table->unsignedBigInteger('user_id')->after('ma_lop_hoc_phan_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign(['dang_ki_id']);
            $table->dropColumn('dang_ki_id');
        });
    }
}
