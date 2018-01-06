<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create customers Table
        Schema::create('customers', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->string('name', 30);
            $table->string('phone_number', 20)->nullable();
            $table->string('email_id', 40)->nullable();
            $table->string('address', 300);
            $table->string('city', 50);
            $table->integer('state_id');
            $table->string('country', 20);
            $table->string('pin_code', 8);
            $table->string('alternate_phone', 20)->nullable();
            $table->enum('source', array('unknown','smartsmith.in','amazon.in','snapdeal','flipkart','ebay'))->default('unknown');
            $table->text('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop customers Table
        Schema::drop('customers');
    }
}
