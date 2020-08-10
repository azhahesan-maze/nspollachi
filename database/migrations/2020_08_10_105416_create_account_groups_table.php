<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('under')->nullable();
            $table->boolean('tax')->nullable()->comment = '1=>Yes,0=>No ';
            $table->string('name_of_tax')->nullable();
            $table->decimal('rate_of_tax', 10,2)->nullable();
            $table->boolean('type')->nullable()->comment = '1=>Goods,0=>Service ';
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
        Schema::dropIfExists('account_groups');
    }
}
