<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSalesChallanTextileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sales_challan_textile', function(Blueprint $table)
        {
            $table->foreign('sales_id', 'fk_sales_challan_textile_sales_id')->references('id')->on('vendor_ecommerce')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('sales_challan_textile', function(Blueprint $table)
        {
            $table->dropForeign('fk_sales_challan_textile_sales_id');
        });
    }
}
