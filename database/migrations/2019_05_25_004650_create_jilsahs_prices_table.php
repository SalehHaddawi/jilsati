<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJilsahsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jilsahs_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jilsah_id');
            $table->boolean('price_per_jilsah')->nullable();
            $table->unsignedDecimal('school_week')->nullable();
            $table->unsignedDecimal('school_weekend')->nullable();
            $table->unsignedDecimal('vacation_week')->nullable();
            $table->unsignedDecimal('vacation_weekend')->nullable();
            $table->unsignedDecimal('eid')->nullable();
            $table->unsignedDecimal('ramadan')->nullable();
            $table->timestamps();

            $table->foreign('jilsah_id')->references('id')->on('jilsahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jilsahs_peices');
    }
}
