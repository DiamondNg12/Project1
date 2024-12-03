<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusTableKetQuaDangKis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ket_qua_dang_kis', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ket_qua_dang_kis', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
