<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hocs', function (Blueprint $table) {
            $table->id('ma_mon_hoc');
            $table->string('ten_mon_hoc');
            $table->integer('so_tin_chi');
            $table->bigInteger('ma_khoa_dao_tao')->unsigned();
            $table->foreign('ma_khoa_dao_tao')->references('ma_khoa_dao_tao')->on('khoa_dao_taos');
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
        Schema::dropIfExists('mon_hocs');
    }
}
