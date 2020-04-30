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
            $table->string('gatepass_no');
            $table->string('invoice_no');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('mrp');
            $table->string('hsn');
            $table->string('quantity');
            $table->string('tax_rate')->nullable();
            $table->string('inclusive')->nullable();
            $table->string('rate_exclusive')->nullable();
            $table->string('rate_inclusive')->nullable();
            $table->string('amount');
            $table->string('discount')->nullable();
            $table->string('net_price');
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
