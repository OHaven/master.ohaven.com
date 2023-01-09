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
            $table->unsignedBigInteger('discount');
            $table->unsignedBigInteger('promolimit');
            $table->string('status')->default("1");
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transid');
            $table->foreignId('userid');
            $table->foreignId('roomid');
            $table->foreignId('promoid');
            $table->foreignId('hotelid');
            $table->float('amount');
            $table->float('ban_amount');
            $table->string('referenceId');
            $table->integer('numberofDays');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('status')->default("0");
            $table->timestamps();
        });

        Schema::create('rtemps', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('userid');
            $table->foreignId('roomid');
            $table->foreignId('promoid');
            $table->foreignId('hotelid');
            $table->float('amount');
            $table->string('referenceId');
            $table->string('status')->default("0");
            $table->timestamps();
        });

        Schema::create('paymentopts', function (Blueprint $table) {
            $table->id('id');
            $table->String('hotelid');
            $table->String('qr');
            $table->String('altdets');
            $table->unsignedBigInteger('stat');
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
        Schema::dropIfExists('promos');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('rtemps');
        Schema::dropIfExists('paymentopts');
    }
};
