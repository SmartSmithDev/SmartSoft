<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create vendor Table
        Schema::create('vendors', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->string('name', 100)->default('Unknown');
            $table->enum('vendor_type', array('Unknown','GST Registered','GST Unregistered','Foriegn Vendor'))->default('Unknown');
            $table->string('gstin', 15)->nullable();
            $table->string('pan', 15);
            $table->string('phone', 300)->nullable();
            $table->string('email_id', 50)->nullable();
            $table->string('address', 300)->nullable();
            $table->string('city', 50)->nullable();
            $table->integer('state_id');
            $table->string('country', 20)->default('INDIA');
            $table->string('pin_code', 8)->nullable();
            $table->string('website', 30)->nullable();
            $table->enum('business_type', array('Unknown','Manufacturer','Trader','Manufacturer and Trader','Graphic Designer','Printing Company','Packing Material','Customs Department','Freight Agent','Other'))->default('Unknown');
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
        //Drop vendor Table
        Schema::drop('vendors');
    }
}
