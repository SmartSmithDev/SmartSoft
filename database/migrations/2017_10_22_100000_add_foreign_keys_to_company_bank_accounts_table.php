<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCompanyBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('company_bank_accounts', function(Blueprint $table)
        {
            $table->foreign('company_id', 'fk_bank_accounts_company_id')->references('id')->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('company_bank_accounts', function(Blueprint $table)
        {
            $table->dropForeign('fk_bank_accounts_company_id');
        });
    }
}
