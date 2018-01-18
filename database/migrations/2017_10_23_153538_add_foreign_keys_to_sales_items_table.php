<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddForeignKeysToSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sales_items', function(Blueprint $table)
        {
            $table->foreign('sales_id', 'fk_sales_item_id')->references('id')->on('sales')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('hsn', 'fk_sales_item_hsn')->references('hsn')->on('hsn')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('unit_id', 'fk_sales_item_unit_id')->references('id')->on('units')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('gst_id', 'fk_sales_item_gst_id')->references('id')->on('gst')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('cess_id', 'fk_sales_item_cess_id')->references('id')->on('cess')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('sales_items', function(Blueprint $table)
        {
            $table->dropForeign('fk_sales_item_id');
            $table->dropForeign('fk_sales_item_hsn');
            $table->dropForeign('fk_sales_item_unit_id');
            $table->dropForeign('fk_sales_item_gst_id');
            $table->dropForeign('fk_sales_item_cess_id');
        });
    }
}