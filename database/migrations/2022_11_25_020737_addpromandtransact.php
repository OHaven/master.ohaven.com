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
        Schema::create('promos', function (Blueprint $table) {
            $table->id('promoid');
            $table->string('roomid');
            $table->string('promocode');
            $table->foreignId('hotelid');
            $table->integer('discount');
            $table->integer('promolimit');
            $table->string('status')->default("1");
            $table->timestamps();
        });

        Schema::create('transaction', function (Blueprint $table) {
            $table->id('transid');
            $table->foreignId('userid');
            $table->foreignId('roomid');
            $table->foreignId('promoid');
            $table->foreignId('hotelid');
            $table->float('amount');
            $table->float('ban_amount');
            $table->string('referenceId');
            $table->integer('numberofDays');
            $table->string('status')->default("0");
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
