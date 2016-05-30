<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function ($table){
            $table->string('first_name');
            $table->string('last_name');            
            $table->string('address');
            $table->string('hold_name');
            $table->string('hold_no');
            $table->string('road_no');
            $table->string('hold_area');
            $table->string('phone_number');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn([ 'phone_number', 'hold_area', 'road_no', 'hold_name', 'address', 'last_name', 'first_name' ]);
    }
}
