<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create sales_items Table
        Schema::create('sales_items', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('sales_id');
            $table->integer('item_id');
            $table->string('hsn', 10);
            $table->enum('item_type', array('Goods','Services'));
            $table->decimal('unit_price', 15 , 2);
            $table->decimal('quantity', 15 , 2);
            $table->integer('unit_id')->default(59);
            $table->decimal('discount', 15 , 2);
            $table->decimal('taxable_value', 15 , 2);
            $table->integer('gst_id');
            $table->decimal('cgst', 15 , 2);
            $table->decimal('sgst', 15 , 2);
            $table->decimal('igst', 15 , 2);
            $table->decimal('ugst', 15 , 2);
            $table->integer('cess_id')->default(0);
            $table->decimal('cess_amount', 15 , 2);
            $table->decimal('tax_amount', 15 , 2);
            $table->decimal('total_product_amount', 15 , 2);
            $table->enum('item_status', array('Shipped','Cancelled','Returned','Pending'))->default('Shipped');
            $table->unique(['sales_id','item_id'], 'uk_sale_prod_check_item');
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
        //Drop sales_items Table
        Schema::drop('sales_items');
    }
}
