<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create sales Table
        Schema::create('sales', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('order_id', 25)->nullable();
            $table->integer('company_id');
            $table->integer('company_branch_id');
            $table->integer('company_account_id');
            $table->string('invoice_number', 20)->unique('uk_sales_invoice_number');
            $table->date('invoice_date');
            $table->enum('invoice_type', array('B2B','B2C'))->default('B2C');
            $table->date('order_date');
            $table->integer('customer_id');
            $table->enum('sales_type', array('E','OE'))->default('E');
            $table->integer('ecommerce_vendor_id');
            $table->integer('supplier_state_id')->default(27);
            $table->integer('supply_state_id')->default(0);
            $table->decimal('total_taxable_value', 15 , 2);
            $table->decimal('total_discount', 15 , 2);
            $table->decimal('cgst', 15 , 2);
            $table->decimal('sgst', 15 , 2);
            $table->decimal('igst', 15 , 2);
            $table->decimal('ugst', 15 , 2);
            $table->decimal('cess', 15 , 2);
            $table->decimal('total_tax_amount', 15 , 2);
            $table->decimal('shipping_cost', 15 , 2);
            $table->decimal('round_off', 15 , 2);
            $table->decimal('total_amount', 15 , 2);
            $table->enum('reverse_charge', array('N','Y'))->default('N');
            $table->text('notes');
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
        //Drop sales Table
        Schema::drop('sales');
    }
}
