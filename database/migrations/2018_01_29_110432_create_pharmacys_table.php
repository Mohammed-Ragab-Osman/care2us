<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('pharm_name');
            $table->string('pharm_governorate');
            $table->string('pharm_city');
            $table->string('pharm_address');
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
        Schema::dropIfExists('pharmacys');
    }
}
