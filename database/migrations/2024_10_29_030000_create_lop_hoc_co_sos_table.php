<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocCoSosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hoc_co_sos', function (Blueprint $table) {
            $table->id();
            $table->string('ma_lop_hoc');
            $table->string('ten_lop_hoc');
            $table->string('co_van_hoc_tap');
            $table->bigInteger('ma_khoa_dao_tao_id')->unsigned();
            $table->foreign('ma_khoa_dao_tao_id')->references('id')->on('khoa_dao_taos');
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
        Schema::dropIfExists('lop_hoc_co_sos');
    }
}
