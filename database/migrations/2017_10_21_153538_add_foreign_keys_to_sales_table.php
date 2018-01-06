<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sales', function(Blueprint $table)
        {
            $table->foreign('ecommerce_vendor_id', 'fk_sales_ecommerce_vendor_id')->references('id')->on('vendor_ecommerce')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supplier_state_id', 'fk_sales_supplier_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supply_state_id', 'fk_sales_supply_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('vendor_id', 'fk_sales_vendor_id')->references('id')->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('sales', function(Blueprint $table)
        {
            $table->dropForeign('fk_sales_ecommerce_vendor_id');
            $table->dropForeign('fk_sales_supplier_state_id');
            $table->dropForeign('fk_sales_supply_state_id');
            $table->dropForeign('fk_sales_vendor_id');
        });
    }
}
