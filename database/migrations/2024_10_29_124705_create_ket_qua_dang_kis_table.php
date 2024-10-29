<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetQuaDangKisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_dang_kis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ma_lop_hoc_phan')->unsigned();
            $table->string('ma_sinh_vien');
            $table->string('ngay_dang_ki');
            $table->foreign('ma_lop_hoc_phan')->references('ma_lop_hoc_phan')->on('lop_hoc_phans');

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
        Schema::dropIfExists('ket_qua_dang_kis');
    }
}
