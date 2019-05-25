<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJilsahsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('jilsahs_locations')) {
            Schema::create('jilsahs_locations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('jilsah_id');
                $table->unsignedBigInteger('city_id');
                $table->string('address');
                $table->text('description');
                $table->text('google_map_url');
                $table->timestamps();


                $table->foreign('jilsah_id')->references('id')->on('jilsahs')->onDelete('cascade');
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('jilsahs_locations');
    }
}
