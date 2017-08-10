<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artpost', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('Название статьи');// name
            $table->dateTime('datetime')->comment('Дата и время');
            $table->text('descart')->comment('Текст статьи'); // text articles
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
        Schema::drop('artpost');
    }
}
