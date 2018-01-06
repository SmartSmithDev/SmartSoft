<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPurchasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('purchase_payments', function(Blueprint $table)
        {
            $table->foreign('company_account_id', 'fk_purchase_payments_company_account_id')->references('id')->on('bank_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('vendor_account_id', 'fk_purchase_payments_vendor_account_id')->references('id')->on('vendor_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('purchase_payments', function(Blueprint $table)
        {
            $table->dropForeign('fk_purchase_payments_company_account_id');
            $table->dropForeign('fk_purchase_payments_vendor_account_id');

        });
    }
}
