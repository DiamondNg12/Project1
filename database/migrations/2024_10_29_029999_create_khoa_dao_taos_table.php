<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoaDaoTaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoa_dao_taos', function (Blueprint $table) {
            $table->id();
            $table->string('ma_khoa_dao_tao');
            $table->string('ten_khoa_dao_tao');
            $table->string('ngay_thanh_lap');
            $table->integer('tinh_trang')->default(1)->comment('1: Đang hoạt động, 0: Không hoạt động');
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
        Schema::dropIfExists('khoa_dao_taos');
    }
}
