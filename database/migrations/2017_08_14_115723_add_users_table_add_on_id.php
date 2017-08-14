<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTableAddOnId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttts', function (Blueprint $table) {

            $table->integer('user_id')->unsigned()->default(4);
            $table->foreign('user_id')->references('id')->on('countries');

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
}
