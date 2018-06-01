<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnnessaryColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_data_pilot', function ($table) {
            $table->dropColumn('name');
            $table->dropColumn('division');
            $table->dropColumn('rating');
        });
        Schema::table('user_data_atc', function ($table) {
            $table->dropColumn('name');
            $table->dropColumn('division');
            $table->dropColumn('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_data_pilot', function (Blueprint $table) {
            $table->string('name');
            $table->string('division');
            $table->integer('rating');
        });
        Schema::table('user_data_atc', function (Blueprint $table) {
            $table->string('name');
            $table->string('division');
            $table->integer('rating');
        });
    }
}
