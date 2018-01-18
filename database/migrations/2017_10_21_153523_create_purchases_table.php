<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create purchases Table
        Schema::create('purchases', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('company_id');
            $table->integer('company_branch_id');
            $table->integer('company_account_id');
            $table->string('invoice_number', 30)->unique('uk_purchase_invoice_number');
            $table->date('invoice_date');
            $table->string('company_gstin', 16)->default('27BIMPB4559A1ZG');
            $table->integer('vendor_id');
            $table->integer('supply_state_id');
            $table->integer('supplier_state_id')->default(27);
            $table->decimal('total_taxable_value', 15 , 2);
            $table->decimal('total_discount', 15 , 2);
            $table->decimal('cgst', 15 , 2);
            $table->decimal('sgst', 15 , 2);
            $table->decimal('igst', 15 , 2);
            $table->decimal('ugst', 15 , 2);
            $table->decimal('cess', 15 , 2);
            $table->decimal('total_tax_amount', 15 , 2);
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
        //Drop Purchases Table
        Schema::drop('purchases');
    }
}
