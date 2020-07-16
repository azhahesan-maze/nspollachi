<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectionInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejection_in_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('r_in_no')->nullable();
            $table->date('r_in_date')->nullable();
            $table->string('s_no')->nullable();
            $table->date('s_date')->nullable();
            $table->string('item_sno')->nullable();
            $table->bigInteger('item_id')->unsigned();
            $table->float('mrp')->nullable();
            $table->float('gst')->nullable();
            $table->decimal('rate_exclusive_tax');
            $table->decimal('rate_inclusive_tax');
            $table->integer('qty');
            $table->bigInteger('uom_id')->unsigned();
            $table->decimal('discount')->nullable();
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
        Schema::dropIfExists('rejection_in_items');
    }
}
