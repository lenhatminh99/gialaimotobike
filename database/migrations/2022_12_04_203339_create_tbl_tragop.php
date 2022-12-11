<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTragop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tragop', function (Blueprint $table) {
            $table->bigIncrements('tragop_id');
            $table->integer('order_id');
            $table->integer('customer_id');
            $table->integer('shipping_id');
            $table->string('order_total');
            $table->integer('monthly_pay');
            $table->string('order_status');
            $table->string('deadline_pay');
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
        Schema::dropIfExists('tbl_tragop');
    }
}
