<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimation__items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estimaion_no');
            $table->string('item_sno');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('hsn');
            $table->string('mrp');
            $table->string('tax_rate');
            $table->string('exclusive_tax');
            $table->string('inclusive_tax');
            $table->string('qty');
            $table->string('uom');
            $table->string('amount');
            $table->string('discount');
            $table->string('gst');
            $table->string('net_value');
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
        Schema::dropIfExists('estimation__items');
    }
}
