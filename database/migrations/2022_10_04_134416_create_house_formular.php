<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseFormular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_formular', function (Blueprint $table) {
            $table->id();
            $table->integer('ord')->default(1);
            $table->string('field_name',100)->default('new_field');
            $table->string('field_type',10)->default('TEXT');
            $table->string('field_data_src',100)->default('house');
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
        Schema::dropIfExists('house_formular');
    }
}
