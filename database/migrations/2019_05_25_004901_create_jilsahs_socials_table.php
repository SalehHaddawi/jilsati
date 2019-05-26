<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJilsahsSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('jilsahs_socials')) {
            Schema::create('jilsahs_socials', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('jilsah_id');
                $table->string('phone');
                $table->string('instagram')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->string('snapchat')->nullable();
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
        Schema::dropIfExists('jilsahs_socials');
    }
}
