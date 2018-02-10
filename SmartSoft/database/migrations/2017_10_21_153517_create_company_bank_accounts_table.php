<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create bank_accounts Table
        Schema::create('company_bank_accounts', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('company_id');
            $table->string('account_identifier', 50);
            $table->string('entity_name', 50);
            $table->string('holder_name', 50);
            $table->string('bank_name', 50);
            $table->string('account_number', 20);
            $table->string('ifsc_code', 15);
            $table->string('notes', 100);
            $table->unique(['account_number','ifsc_code'], 'uk_account_check');
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
        //Drop bank_accounts Table
        Schema::drop('company_bank_accounts');
    }
}
