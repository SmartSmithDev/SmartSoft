<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChallanTextileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create Textile Sales Challan Table
        Schema::create('sales_challan_textile', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('sales_id');
            $table->decimal('metres', 15 , 2);
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
        //Drop sales_challan_textile Table
        Schema::drop('sales_challan_textile');
    }
}
