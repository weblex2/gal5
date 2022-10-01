<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GallerPicsAddLonLat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_pics', function($table)
        {
            $table->decimal('lat', $precision = 16, $scale = 8)->after('file_name')->default(0);
            $table->decimal('lon', $precision = 16, $scale = 8)->after('lat')->default(0);
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
