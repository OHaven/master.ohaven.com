<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('roomid');
            $table->string('roomname');
            $table->string('room_number');
            $table->foreignId('hotelid');
            $table->float('pricing');
            $table->string('cap');
            $table->string('desc');
            $table->string('stat')->default("1");
            $table->string('roomph');
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
        //
    }
};
