<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnMoDangKiAndDongDangKiTableLopHocPhans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lop_hoc_phans', function (Blueprint $table) {
            $table->string('mo_dang_ki')->after('sv_toi_da')->nullable();
            $table->string('dong_dang_ki')->after('mo_dang_ki')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lop_hoc_phans', function (Blueprint $table) {
            $table->dropColumn('mo_dang_ki');
            $table->dropColumn('dong_dang_ki');
        });
    }
}
