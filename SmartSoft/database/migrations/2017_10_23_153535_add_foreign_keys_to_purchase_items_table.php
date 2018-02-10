<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create purchase Items foreign keys
        Schema::table('purchase_items', function(Blueprint $table)
        {
            $table->foreign('gst_id', 'fk_purchase_item_gst_id')->references('id')->on('gst')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cess_id', 'fk_purchase_item_cess_id')->references('id')->on('cess')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('hsn', 'fk_purchase_item_hsn')->references('hsn')->on('hsn')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('item_id', 'fk_purchase_item_item_id')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('purchase_id', 'fk_purchase_item_purchase_id')->references('id')->on('purchases')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('unit_id', 'fk_purchase_item_unit_id')->references('id')->on('units')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remove purchase Items foreign keys
        Schema::table('purchase_items', function(Blueprint $table)
        {
            $table->dropForeign('fk_purchase_item_gst_id');
            $table->dropForeign('fk_purchase_item_cess_id');
            $table->dropForeign('fk_purchase_item_hsn');
            $table->dropForeign('fk_purchase_item_item_id');
            $table->dropForeign('fk_purchase_item_purchase_id');
            $table->dropForeign('fk_purchase_item_unit_id');
        });
    }
}
