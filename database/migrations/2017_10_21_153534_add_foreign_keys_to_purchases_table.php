<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('purchases', function(Blueprint $table)
        {
            $table->foreign('vendor_id', 'fk_purchases_vendor_id')->references('id')->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supply_state_id', 'fk_purchases_supply_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supplier_state_id', 'fk_purchases_supplier_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('purchases', function(Blueprint $table)
        {
            $table->dropForeign('fk_purchases_vendor_id');
            $table->dropForeign('fk_purchases_supply_state_id');
            $table->dropForeign('fk_purchases_supplier_state_id');
        });
    }
}
