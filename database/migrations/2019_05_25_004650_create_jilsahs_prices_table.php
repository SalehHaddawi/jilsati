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
        if (!Schema::hasTable('jilsahs_prices')) {
            Schema::create('jilsahs_prices', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('jilsah_id');
                $table->unsignedDecimal('school_week');
                $table->unsignedDecimal('school_weekend');
                $table->unsignedDecimal('vacation_week');
                $table->unsignedDecimal('vacation_weekend');
                $table->unsignedDecimal('eid');
                $table->unsignedDecimal('ramadan');
                $table->timestamps();

                $table->foreign('jilsah_id')->references('id')->on('jilsahs')->onDelete('cascade');
            });
        }
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
