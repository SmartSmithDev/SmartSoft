<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPurchaseChallanTextileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add foreign key to purchase_challan_textile Table
        Schema::table('purchase_challan_textile', function(Blueprint $table)
        {
            $table->foreign('purchase_id', 'fk_textile_purchase_challan_id')->references('id')->on('purchases')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remove foreign keys from purchase_challan_textile Table
        Schema::table('purchase_challan_textile', function(Blueprint $table)
        {
            $table->dropForeign('fk_textile_purchase_challan_id');
        });
    }
}
