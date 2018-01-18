<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('purchases', function(Blueprint $table)
        {
            $table->foreign('vendor_id', 'fk_purchases_vendor_id')->references('id')->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supply_state_id', 'fk_purchases_supply_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('supplier_state_id', 'fk_purchases_supplier_state_id')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('company_id', 'fk_purchases_company_id')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('company_branch_id', 'fk_purchases_company_branch_id')->references('id')->on('company_branches')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('company_account_id', 'fk_purchases_company_account_id')->references('id')->on('company_bank_accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('purchases', function(Blueprint $table)
        {
            $table->dropForeign('fk_purchases_vendor_id');
            $table->dropForeign('fk_purchases_supply_state_id');
            $table->dropForeign('fk_purchases_supplier_state_id');
            $table->dropForeign('fk_purchases_company_id');
            $table->dropForeign('fk_purchases_company_branch_id');
            $table->dropForeign('fk_purchases_company_account_id');
        });
    }
}
