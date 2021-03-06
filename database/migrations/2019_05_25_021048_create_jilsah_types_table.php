<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJilsahTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jilsah_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jilsah_id');
            $table->string('name');
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
        Schema::dropIfExists('jilsah_types');
    }
}
