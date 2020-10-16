<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('merchandiser');
            $table->integer('buyer_id');
            $table->string('season');
            $table->string('style_no');
            $table->string('sample_name');
            $table->ENUM('sample_type', ['Proto sample', 'Fit sample', 'Size set sample', 'Counter sample', 'Salesman sample (SMS)', 'Pre-production sample (PPS)', 'Top over production sample (TOP)', 'Shipment sample'])->default('Proto sample');
            $table->integer('product_type_id');
            $table->float('unit_price', 8, 2);
            $table->float('unit_cost', 8, 2);
            $table->text('descriptions')->nullable();
            $table->text('specifications')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('samples');
    }
}
