<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketRefOnUserdataatcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_data_atc', function (Blueprint $table) {
            $table->string('ticket_ref')->after('event_ref');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_data_atc', function (Blueprint $table) {
            $table->dropColumn('ticket_ref');
        });
    }
}
