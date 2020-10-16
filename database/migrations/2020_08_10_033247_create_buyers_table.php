<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('buyer_name');
            $table->string('company_name');
            $table->string('phone', '50');
            $table->string('email', '50');
            $table->string('address');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->ENUM('buyer_type', ['local', 'foreign']);
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
        Schema::dropIfExists('buyers');
    }
}
