<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('start_location');
            $table->integer('end_location');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('price_per_ton');
            $table->string('price_per_price');
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
        Schema::dropIfExists('trip_datas');
    }
}
