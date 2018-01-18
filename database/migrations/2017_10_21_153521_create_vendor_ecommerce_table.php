<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorEcommerceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create vendor_ecommerce Table
        Schema::create('vendor_ecommerce', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->string('gstin', 20)->unique('uk_vendor_ecom_gstin');
            $table->string('name', 50);
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
        //Drop vendor_ecommerce Table
        Schema::drop('vendor_ecommerce');
    }
}
