<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('supplier_name');
            $table->string('company_name');
            $table->string('phone', '50');
            $table->string('email', '50');
            $table->string('address');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('supplier_of');
            $table->ENUM('supplier_type', ['local', 'foreign']);
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
        Schema::dropIfExists('suppliers');
    }
}
