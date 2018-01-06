<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create sales_payments Table
        Schema::create('sales_payments', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('sales_id');
            $table->date('payment_date');
            $table->enum('payment_mode', array('Bank Account Transfer','Credit Card','Debit Card','PayPal','Cash Payment','Cheque','Demand Draft','Paytm Wallet Transfer','Foreign Remittance','Deduction at Source','Other'));
            $table->decimal('paid_amount', 15 , 2);
            $table->string('payment_terms', 50);
            $table->enum('payment_type', array('Complete Payment','Advance Payment','Partial Payment','Balance Payment','Instalment Payment'))->default('Complete Payment');
            $table->integer('company_account_id');
            $table->integer('vendor_account_id');
            $table->string('payment_reference', 20);
            $table->text('payment_notes', 65535);
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
        //Drop sales_payments Table
        Schema::drop('sales_payments');
    }
}
