<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('member_id')->unsigned();
            $table->integer('locker_id')->unsigned();
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->timestamps();
        });
        Schema::table('orders', function($table) {
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('locker_id')->references('id')->on('lockers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}