<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJilsahsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jilsahs_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jilsah_id');
            $table->string('src');
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
        Schema::dropIfExists('jilsahs_images');
    }
}
