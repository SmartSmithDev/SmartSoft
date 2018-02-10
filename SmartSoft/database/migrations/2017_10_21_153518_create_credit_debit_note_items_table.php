<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditDebitNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create credit_debit_note_products Table
        Schema::create('credit_debit_note_items', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('note_id');
            $table->integer('item_id');
            $table->string('hsn', 10);
            $table->enum('item_type', array('Goods','Services'));
            $table->decimal('unit_price', 15 , 2);
            $table->integer('quantity');
            $table->integer('unit_id')->default(59);
            $table->decimal('discount', 15 , 2);
            $table->decimal('taxable_value', 15 , 2);
            $table->integer('gst_id');
            $table->decimal('cgst', 15 , 2);
            $table->decimal('sgst', 15 , 2);
            $table->decimal('igst', 15 , 2);
            $table->decimal('ugst', 15 , 2);
            $table->decimal('cess', 15 , 2);
            $table->decimal('tax_amount', 15 , 2);
            $table->decimal('total_product_amount', 15 , 2);
            $table->unique(['note_id','item_id'], 'uk_cdn_check_item');
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
        //Drop the credit_debit_note_items table
        Schema::drop('credit_debit_note_items');
    }
}
