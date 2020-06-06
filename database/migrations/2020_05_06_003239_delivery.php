<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Delivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建用户收货地址表
        Schema::create('delivery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> char('userid', 20);
            $table -> char('address', 50);
            $table -> char('phone', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
