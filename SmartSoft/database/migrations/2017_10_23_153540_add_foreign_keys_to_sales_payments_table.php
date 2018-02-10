<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSalesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sales_payments', function(Blueprint $table)
        {
            $table->foreign('sales_id', 'fk_sales_payments_sales_id')->references('id')->on('sales')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('company_account_id', 'fk_sales_payments_company_account')->references('id')->on('company_bank_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('customer_account_id', 'fk_sales_payments_customer_account')->references('id')->on('vendor_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('sales_payments', function(Blueprint $table)
        {
            $table->dropForeign('fk_sales_payments_sales_id');
            $table->dropForeign('fk_sales_payments_company_account');
            $table->dropForeign('fk_sales_payments_customer_account');
        });
    }
}
