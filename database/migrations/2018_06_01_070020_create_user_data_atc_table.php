<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDataAtcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data_atc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vid')->length(6);
            $table->string('name');
            $table->string('division');
            $table->integer('rating');
            $table->string('event_ref');
            $table->string('position');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
            $table->SoftDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_data_atc');
    }
}
