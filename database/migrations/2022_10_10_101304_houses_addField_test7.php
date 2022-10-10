<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HousesAddFieldTest7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
                Schema::table('houses', function (Blueprint $table) {
                    $table->string('test7',100)->after('created_at');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function($table) {
            $table->dropColumn('test7');
        });
    }
}