<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_no');
            $table->string('invoice_no');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('mrp');
            $table->string('hsn');
            $table->string('quantity');
            $table->string('tax_rate');
            $table->string('inclusive');
            $table->string('rate_exclusive');
            $table->string('rate_inclusive');
            $table->string('amount');
            $table->string('discount');
            $table->string('net_price');
            $table->string('total_amount');
            $table->string('total_price');
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
        Schema::dropIfExists('purchases');
    }
}
