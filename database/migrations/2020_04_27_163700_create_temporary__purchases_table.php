<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary__purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gatepass_no');
            $table->string('invoice_no');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('mrp');
            $table->string('hsn');
            $table->string('quantity');
            $table->string('tax_rate')->nullable();
            $table->string('inclusive');
            $table->string('rate_exclusive')->nullable();
            $table->string('rate_inclusive')->nullable();
            $table->string('amount');
            $table->string('discount')->nullable();
            $table->string('net_price');
            $table->string('status')->nullable()->comment = '1=>Not Removed,0=>Removed';
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
        Schema::dropIfExists('temporary__purchases');
    }
}
